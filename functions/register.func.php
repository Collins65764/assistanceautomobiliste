<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuration de la base de données
$config = [
    'host' => 'localhost',
    'dbname' => 'ntouks',
    'user' => 'root',
    'pass' => ''
];

// Fonction de connexion à la base de données
function getDbConnection($config) {
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, $config['user'], $config['pass'], $options);
    } catch (PDOException $e) {
        error_log("Erreur de connexion : " . $e->getMessage());
        die("Une erreur est survenue lors de la connexion à la base de données.");
    }
}

// Fonction pour vérifier si un utilisateur existe déjà
function registerUser($conn, $username, $email, $password, $numero_tel) {
    try {
        // Vérifier si l'utilisateur existe déjà
        if (user_already_exists($conn, $email, $username)) {
            return "L'utilisateur existe déjà.";
        }

        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user'; // Valeur par défaut pour le rôle

        // Préparer la requête d'insertion
        $sql = "INSERT INTO user (username, email, password_hash, role, numero_tel) 
                VALUES (:username, :email, :password_hash, :role, :numero_tel)";
        $stmt = $conn->prepare($sql);

        // Lier les paramètres
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password_hash', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':numero_tel', $numero_tel, PDO::PARAM_STR);

        // Exécuter la requête
        if ($stmt->execute()) {
            return "Enregistrement réussi.";
        } else {
            return "Erreur lors de l'enregistrement: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        return "Erreur de base de données: " . $e->getMessage();
    }
}

function user_already_exists($conn, $email, $username) {
    $sql = "SELECT id FROM user WHERE email = :email OR username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch() !== false;
}

// Utilisation
$conn = getDbConnection($config);

// Exemple d'utilisation (à adapter selon votre logique de formulaire)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['floating_full_name'] ?? '';
    $email = $_POST['floating_email'] ?? '';
    $password = $_POST['floating_password'] ?? '';
    $numero_tel = $_POST['floating_phone'] ?? '';

    $result = registerUser($conn, $username, $email, $password, $numero_tel);
    echo $result;
}
?>