<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "votre_mot_de_passe";
$dbname = "ntouks";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Fonction pour vérifier si l'utilisateur est un administrateur
function estAdministrateur($idUtilisateur) {
    global $conn;
    $sql = "SELECT role FROM utilisateurs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idUtilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['role'] === 'administrateur';
    }
    return false;
}

// Fonction pour affecter une demande à un mécanicien
function affecterDemande($idDemande, $idMecanicien) {
    global $conn;
    $sql = "UPDATE demandes_assistance SET id_mecanicien = ?, statut = 'assignée' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idMecanicien, $idDemande);
    return $stmt->execute();
}

// Fonction pour supprimer un automobiliste
function supprimerAutomobiliste($idAutomobiliste) {
    global $conn;
    $sql = "DELETE FROM automobilistes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idAutomobiliste);
    return $stmt->execute();
}

// Traitement des actions d'administration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUtilisateur = $_SESSION['id_utilisateur']; // Assurez-vous d'avoir une session active

    if (estAdministrateur($idUtilisateur)) {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'affecter_demande':
                    $idDemande = $_POST['id_demande'];
                    $idMecanicien = $_POST['id_mecanicien'];
                    if (affecterDemande($idDemande, $idMecanicien)) {
                        echo "Demande affectée avec succès.";
                    } else {
                        echo "Erreur lors de l'affectation de la demande.";
                    }
                    break;

                case 'supprimer_automobiliste':
                    $idAutomobiliste = $_POST['id_automobiliste'];
                    if (supprimerAutomobiliste($idAutomobiliste)) {
                        echo "Automobiliste supprimé avec succès.";
                    } else {
                        echo "Erreur lors de la suppression de l'automobiliste.";
                    }
                    break;

                default:
                    echo "Action non reconnue.";
            }
        }
    } else {
        echo "Accès non autorisé. Vous devez être administrateur pour effectuer cette action.";
    }
}

// Exemple de requête pour obtenir la liste des demandes non assignées
function getDemandesNonAssignees() {
    global $conn;
    $sql = "SELECT * FROM demandes_assistance WHERE statut = 'en attente'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Exemple de requête pour obtenir la liste des mécaniciens disponibles
function getMecaniciensDisponibles() {
    global $conn;
    $sql = "SELECT * FROM mecaniciens WHERE disponible = 1";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fermeture de la connexion à la base de données
$conn->close();
?>