<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WZB - Formulaires d'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    
    <div class="container">
        <!-- Formulaire Automobiliste -->
        <div class="form-container">
            <h2>Inscription</h2>
            <form action="" class="w-full h-screen flex justify-center items-center">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nom complet" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" placeholder="Téléphone" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-car"></i>
                    <input type="text" placeholder="Marque et modèle du véhicule" required>
                </div>
                <button type="submit">S'inscrire</button>
                <p class="text-center text-muted">
                    En cliquant sur S'inscrire, vous acceptez nos <a href="">Conditions generales</a>, notre <a href=""> Politique de confidentialite></a> et notre<a href="">politique d'utilisation </a>des cookies
                </p> 
                <p class="text-center">
                    Avez vous deja un compte ? <a href="login.php">connexion</a>
                </p>
            </form>
        </div>
    
</body>
</html>

      