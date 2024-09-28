<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ntouks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Fonction pour envoyer une demande d'assistance
function envoyerDemandeAssistance($idAutomobiliste,$idstation, $latitude, $nom, $telephone, $localisation, $longitude,$typepanne,$descriptionpanne,$marquevoiture,$modelevoiture) {
    global $conn;
    
    // Trouver la station la plus proche
    $sqlStation = "SELECT id, (
        6371 * acos(
            cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) +
            sin(radians(?)) * sin(radians(latitude))
        )
    ) AS distance FROM stations ORDER BY distance LIMIT 1";
    
    $stmtStation = $conn->prepare($sqlStation);
    $stmtStation->bind_param("ddd", $latitude, $longitude, $latitude);
    $stmtStation->execute();
    $resultStation = $stmtStation->get_result();
    $stationProche = $resultStation->fetch_assoc();
    
    // Insérer la demande d'assistance
    $sqlDemande = "INSERT INTO demandes_assistance (id_automobiliste, id_station, nom, telephone, localisation,latitude, longitude,typepanne,descriptionpanne,marquevoiture,modele voiture) VALUES (?, ?, ?, ?, ?,?,?,?)";
    $stmtDemande = $conn->prepare($sqlDemande);
    $stmtDemande->bind_param("iidds", $idAutomobiliste, $stationProche['id'], $latitude, $longitude, $probleme);
    
    if ($stmtDemande->execute()) {
        return "Demande envoyée avec succès à la station la plus proche.";
    } else {
        return "Erreur lors de l'envoi de la demande.";
    }
}

// Fonction pour modifier le profil de l'automobiliste
function modifierProfil($idAutomobiliste, $nom, $prenom, $email, $telephone) {
    global $conn;
    $sql = "UPDATE automobilistes SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nom, $prenom, $email, $telephone, $idAutomobiliste);
    
    if ($stmt->execute()) {
        return "Profil mis à jour avec succès.";
    } else {
        return "Erreur lors de la mise à jour du profil.";
    }
}

// Fonction pour changer le mot de passe
function changerMotDePasse($idAutomobiliste, $ancienMdp, $nouveauMdp) {
    global $conn;
    
    // Vérifier l'ancien mot de passe
    $sqlVerif = "SELECT mot_de_passe FROM automobilistes WHERE id = ?";
    $stmtVerif = $conn->prepare($sqlVerif);
    $stmtVerif->bind_param("i", $idAutomobiliste);
    $stmtVerif->execute();
    $resultVerif = $stmtVerif->get_result();
    $user = $resultVerif->fetch_assoc();
    
    if (password_verify($ancienMdp, $user['mot_de_passe'])) {
        $nouveauMdpHash = password_hash($nouveauMdp, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE automobilistes SET mot_de_passe = ? WHERE id = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("si", $nouveauMdpHash, $idAutomobiliste);
        
        if ($stmtUpdate->execute()) {
            return "Mot de passe changé avec succès.";
        } else {
            return "Erreur lors du changement de mot de passe.";
        }
    } else {
        return "Ancien mot de passe incorrect.";
    }
}

// Traitement des actions de l'automobiliste
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idAutomobiliste = $_SESSION['id_automobiliste']; // Assurez-vous d'avoir une session active

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'envoyer_demande':
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];
                $probleme = $_POST['probleme'];
                echo envoyerDemandeAssistance($idAutomobiliste, $latitude, $longitude, $probleme);
                break;

            case 'modifier_profil':
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];
                echo modifierProfil($idAutomobiliste, $nom, $prenom, $email, $telephone);
                break;

            case 'changer_mot_de_passe':
                $ancienMdp = $_POST['ancien_mdp'];
                $nouveauMdp = $_POST['nouveau_mdp'];
                echo changerMotDePasse($idAutomobiliste, $ancienMdp, $nouveauMdp);
                break;

            default:
                echo "Action non reconnue.";
        }
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>