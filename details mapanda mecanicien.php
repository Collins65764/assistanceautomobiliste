<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Intervention</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .info-group {
            margin-bottom: 20px;
        }
        .info-label {
            font-weight: bold;
            color: #4CAF50;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
        }
        .status-en-cours {
            background-color: #FFA500;
            color: white;
        }
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de l'Intervention</h1>
        
        <div class="info-group">
            <p><span class="info-label">Mécanicien:</span> Mapanda Lionnel</p>
            <p><span class="info-label">Spécialité:</span> Mecanique generale</p>
            <p><span class="info-label">Expérience:</span> 8 ans</p>
        </div>
        
        <div class="info-group">
            <p><span class="info-label">Date de l'intervention:</span> 03/09/2024</p>
            <p><span class="info-label">Heure de début:</span> 14:30</p>
            <p><span class="info-label">Statut:</span> <span class="status status-en-cours">Disponible</span></p>
        </div>
        <!--
        <div class="info-group">
            <p><span class="info-label">Véhicule:</span> Peugeot 308</p>
            <p><span class="info-label">Problème signalé:</span> Panne électrique - Batterie ne charge pas</p>
        </div>
        
        <div class="info-group">
            <p><span class="info-label">Notes:</span> Vérification du système de charge en cours. Possible problème d'alternateur.</p>
        </div>
    -->
        <a href="Interface station service.html" class="btn">Retour au tableau de bord</a>
    </div>
</body>
</html>