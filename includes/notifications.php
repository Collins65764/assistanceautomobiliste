<?php
// Assurez-vous d'avoir PHPMailer installé via Composer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Connexion à la base de données (à adapter selon votre configuration)
$conn = new mysqli("localhost", "root", "votre_mot_de_passe", "ntouks");

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Fonction pour envoyer un e-mail
function envoyerEmail($destinataire, $sujet, $corps) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';  // Spécifiez votre serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'votre_email@example.com';
        $mail->Password   = 'votre_mot_de_passe_email';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('noreply@votreservice.com', 'Service d\'Assistance Automobile');
        $mail->addAddress($destinataire);
        $mail->isHTML(true);
        $mail->Subject = $sujet;
        $mail->Body    = $corps;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Erreur lors de l'envoi de l'e-mail: {$mail->ErrorInfo}");
        return false;
    }
}

// Fonction pour créer une notification en base de données
function creerNotification($idDestinataire, $typeDestinataire, $message) {
    global $conn;
    $sql = "INSERT INTO notifications (id_destinataire, type_destinataire, message, lu, date_creation) 
            VALUES (?, ?, ?, 0, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $idDestinataire, $typeDestinataire, $message);
    return $stmt->execute();
}

// Fonction pour notifier l'automobiliste de sa demande
function notifierAutomobiliste($idDemande, $idAutomobiliste, $emailAutomobiliste) {
    $sujet = "Confirmation de votre demande d'assistance";
    $corps = "Votre demande d'assistance (ID: {$idDemande}) a été reçue et est en cours de traitement.";
    
    envoyerEmail($emailAutomobiliste, $sujet, $corps);
    creerNotification($idAutomobiliste, 'automobiliste', $corps);
}

// Fonction pour notifier la station-service d'une nouvelle demande
function notifierStation($idDemande, $idStation, $emailStation) {
    $sujet = "Nouvelle demande d'assistance reçue";
    $corps = "Une nouvelle demande d'assistance (ID: {$idDemande}) a été reçue et nécessite votre attention.";
    
    envoyerEmail($emailStation, $sujet, $corps);
    creerNotification($idStation, 'station', $corps);
}

// Fonction pour notifier le mécanicien d'une nouvelle assignation
function notifierMecanicien($idDemande, $idMecanicien, $emailMecanicien) {
    $sujet = "Nouvelle demande d'assistance assignée";
    $corps = "Une nouvelle demande d'assistance (ID: {$idDemande}) vous a été assignée.";
    
    envoyerEmail($emailMecanicien, $sujet, $corps);
    creerNotification($idMecanicien, 'mecanicien', $corps);
}

// Exemple d'utilisation lors de la création d'une demande
function creerDemande($idAutomobiliste, $idStation, $probleme) {
    global $conn;
    
    // Insérer la demande dans la base de données
    $sql = "INSERT INTO demandes_assistance (id_automobiliste, id_station, probleme, statut, date_creation) 
            VALUES (?, ?, ?, 'en attente', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $idAutomobiliste, $idStation, $probleme);
    
    if ($stmt->execute()) {
        $idDemande = $stmt->insert_id;
        
        // Récupérer les informations nécessaires pour les notifications
        $sqlInfos = "SELECT a.email as email_automobiliste, s.email as email_station 
                     FROM automobilistes a, stations s 
                     WHERE a.id = ? AND s.id = ?";
        $stmtInfos = $conn->prepare($sqlInfos);
        $stmtInfos->bind_param("ii", $idAutomobiliste, $idStation);
        $stmtInfos->execute();
        $result = $stmtInfos->get_result();
        $infos = $result->fetch_assoc();
        
        // Envoyer les notifications
        notifierAutomobiliste($idDemande, $idAutomobiliste, $infos['email_automobiliste']);
        notifierStation($idDemande, $idStation, $infos['email_station']);
        
        return "Demande créée avec succès et notifications envoyées.";
    } else {
        return "Erreur lors de la création de la demande.";
    }
}

// Exemple d'utilisation lors de l'assignation d'une demande à un mécanicien
function assignerDemande($idDemande, $idMecanicien) {
    global $conn;
    
    $sql = "UPDATE demandes_assistance SET id_mecanicien = ?, statut = 'assignée' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idMecanicien, $idDemande);
    
    if ($stmt->execute()) {
        // Récupérer l'email du mécanicien
        $sqlMecanicien = "SELECT email FROM mecaniciens WHERE id = ?";
        $stmtMecanicien = $conn->prepare($sqlMecanicien);
        $stmtMecanicien->bind_param("i", $idMecanicien);
        $stmtMecanicien->execute();
        $result = $stmtMecanicien->get_result();
        $mecanicien = $result->fetch_assoc();
        
        // Envoyer la notification au mécanicien
        notifierMecanicien($idDemande, $idMecanicien, $mecanicien['email']);
        
        return "Demande assignée avec succès et notification envoyée au mécanicien.";
    } else {
        return "Erreur lors de l'assignation de la demande.";
    }
}

// Exemple d'utilisation
// creerDemande(1, 1, "Panne de batterie");
// assignerDemande(1, 1);

?>