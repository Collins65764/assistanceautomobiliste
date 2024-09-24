<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Demande d'Assistance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-color: #ecf0f1;
            --text-color: #333;
            --card-background: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .header {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1rem;
            position: relative;
        }

        .back-button {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .detail-card {
            background-color: var(--card-background);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }

        .detail-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .urgence-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .urgence-haute { background-color: var(--accent-color); color: white; }
        .urgence-moyenne { background-color: #f39c12; color: white; }
        .urgence-basse { background-color: #2ecc71; color: white; }

        .detail-section {
            margin-bottom: 1.5rem;
        }

        .detail-section h3 {
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .detail-item {
            display: flex;
            margin-bottom: 0.5rem;
        }

        .detail-label {
            flex: 0 0 150px;
            font-weight: bold;
        }

        .detail-value {
            flex: 1;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary {
            background-color: var(--primary-color);
            color: white;
        }

        @media (max-width: 600px) {
            .detail-item {
                flex-direction: column;
            }

            .detail-label {
                margin-bottom: 0.2rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="reception demande assistance.html" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <h1>Détails de la Demande</h1>
    </header>

    <div class="container">
        <div class="detail-card">
            <div class="detail-header">
                <span class="detail-title">Demande #12345</span>
                <span class="urgence-badge urgence-haute">Urgence Haute</span>
            </div>

            <div class="detail-section">
                <h3>Informations du Client</h3>
                <div class="detail-item">
                    <span class="detail-label">Nom:</span>
                    <span class="detail-value">Ngueleu isidore</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Téléphone:</span>
                    <span class="detail-value">657646104</span>
                </div>
            </div>

            <div class="detail-section">
                <h3>Informations du Véhicule</h3>
                <div class="detail-item">
                    <span class="detail-label">Marque:</span>
                    <span class="detail-value">Peugeot</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Modèle:</span>
                    <span class="detail-value">308</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Année:</span>
                    <span class="detail-value">2018</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Immatriculation:</span>
                    <span class="detail-value">LT258jl</span>
                </div>
            </div>

            <div class="detail-section">
                <h3>Détails du Problème</h3>
                <div class="detail-item">
                    <span class="detail-label">Type de panne:</span>
                    <span class="detail-value">Panne de batterie</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Description:</span>
                    <span class="detail-value">Le véhicule ne démarre plus. Les phares et le klaxon ne fonctionnent pas non plus. Suspicion d'une batterie complètement déchargée ou défectueuse.</span>
                </div>
            </div>

            <div class="detail-section">
                <h3>Localisation</h3>
                <div class="detail-item">
                    <span class="detail-label">Adresse:</span>
                    <span class="detail-value">Bali nouveau mont cameroun</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Coordonnées GPS:</span>
                    <span class="detail-value">48.8566° N, 2.3522° E</span>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary" onclick="assignerIntervention()">Assigner un mécanicien</button>
                <button class="btn btn-secondary" onclick="contacterClient()">Contacter le client</button>
            </div>
        </div>
    </div>

    <script>
        function assignerIntervention() {
            alert("Fonctionnalité d'assignation à implémenter");
        }

        function contacterClient() {
            alert("Fonctionnalité de contact client à implémenter");
        }
    </script>
</body>
</html>