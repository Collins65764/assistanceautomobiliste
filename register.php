<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ntouks', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

if(isset($_POST['submit'])){

   $name = $_POST['username'];
   $email = $_POST['email'];
   $pass = md5($_POST['password_hash']);
   $cpass = md5($_POST['cpassword_hash']);
   $user_type = $_POST['user_type'];
   $telephone = md5($_POST['numero_tel']);
   $marque = md5($_POST['marque']);

   $stmt = $pdo->prepare("SELECT * FROM `user` WHERE email = :email AND password_hash = :pass");
   $stmt->execute(['email' => $email, 'pass' => $pass]);

   if($stmt->rowCount() > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $stmt = $pdo->prepare("INSERT INTO `user`(username, email, password_hash, user_type, numero_tel, marque) VALUES(:name, :email, :pass, :user_type, :telephone, :marque)");
         $stmt->execute([
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
            'user_type' => $user_type,
            'telephone' => $telephone,
            'marque' => $marque
         ]);
         $message[] = 'registered successfully!';
         header("location: login.php");
      }
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
    </style>
</head>
<body>
    
    <div class="container">
        <!-- Formulaire Automobiliste -->
        <div class="form-container">
            <h2>Inscription</h2>
            <form method= "post">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Nom complet" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_hash" placeholder="Mot de passe" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="cpassword_hash" placeholder="repetez votre mot de passe" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="numero_tel"  placeholder="Téléphone" required>
          </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <select name="user_type" class="input100">
							<option value="automobiliste">automobiliste</option>
							<option value="mecanicien">mecanicien</option>
                            <option value="station_service">station service</option>
						</select>
                </div>
                <div class="input-group">
                    <i class="fas fa-car"></i>
                    <input type="text" name="marque" placeholder="Marque et modèle du véhicule" required>
                </div>
                <button name="submit" type="submit">S'inscrire</button>
                <p class="text-center text-muted">
                    En cliquant sur S'inscrire, vous acceptez nos <a href="">Conditions generales</a>, notre <a href=""> Politique de confidentialite></a> et notre<a href="">politique d'utilisation </a>des cookies
                </p> 
                <p class="text-center">
                    Avez vous deja un compte ? <a href="connexion ntouks.html">connexion</a>
                </p>
            </form>
        </div>
    
</body>
</html>

      