<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         body{: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33% - 20px);
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
            width: 100%;
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
</head>
<body>
    <div class="form-container">
        <h2>Inscription Mécanicien</h2>
        <form>
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
                <i class="fas fa-tools"></i>
                <select required>
                    <option value="">Spécialité</option>
                    <option value="general">Mécanique générale</option>
                    <option value="electrique">Système électrique</option>
                    <option value="carrosserie">Carrosserie</option>
                    <option value="pneumatique">Pneumatique</option>
                </select>
            </div>
            <div class="input-group">
                <i class="fas fa-id-card"></i>
                <input type="text" placeholder="Numéro de licence" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</div>
    </body>
</html>