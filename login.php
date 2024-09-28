<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ntouks', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = md5($_POST['password_hash']);

   $stmt = $pdo->prepare("SELECT * FROM `user` WHERE email = :email");
   $stmt->execute(['email' => $email]);

   if($stmt->rowCount() > 0){
   
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if($row['user_type'] == 'station_service'){

         $_SESSION['station_service_name'] = $row['username'];
         $_SESSION['station_service_email'] = $row['email'];
         $_SESSION['station_service_id'] = $row['id'];
         header('location:admin/station.php');

      }elseif($row['user_type'] == 'automobiliste'){

         $_SESSION['automobiliste_name'] = $row['username'];
         $_SESSION['automobiliste_email'] = $row['email'];
         $_SESSION['automobiliste_id'] = $row['id'];
         header('location:automobiliste/dashboard.php');
         
      }elseif($row['user_type'] == 'mecanicien'){

        $_SESSION['mecanicien_name'] = $row['username'];
        $_SESSION['mecanicien_email'] = $row['email'];
        $_SESSION['mecanicien_id'] = $row['id'];
        echo 'reussi';

      }

   }else{
      
      $_SESSION['LOGIN_ERROR_MESSAGE'] = ' nous ne trouvons pas votre compte';
   }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WZB - Formulaires d'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .form-container {
                width: 100%;
            }
        }
        h2 {
            color: #2c3e50;
            text-align: center;
        }
        .input-group {
            margin-bottom: 15px;
            position: relative;
        }
        .input-group i {
            position: absolute;
            left: 10px;
            top: 12px;
            color: #3498db;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        select {
            width: 300px;
            padding: 10px 10px 10px 35px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .error_message {
            color: white;
            background-color: red;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Formulaire Automobiliste -->
        <div class="form-container">
            <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="error_message">
                    <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                    unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
            <?php endif; ?>
            <h2>SE Connecter</h2>
            <form method="post">
                
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_hash" placeholder="Mot de passe" required>
                </div>
                <button name="submit" type="submit">Se connecter</button>
                <p class="text-center text-muted">
                    En cliquant sur Se connecter, vous acceptez nos <a href="">Conditions generales</a>, notre <a href=""> Politique de confidentialite></a> et notre<a href="">politique d'utilisation </a>des cookies
                </p> 
                <p class="text-center">
                    Avez vous deja un compte ? <a href="register.php">S'inscrire</a>
                </p>
            </form>
        </div>
    </div>

      