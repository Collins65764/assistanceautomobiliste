<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WZB - Interface Automobiliste Améliorée</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f0f0f0;
            --text-color: #333;
            --card-background: #fff;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        .header {
            background-color: var(--secondary-color);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo {
            font-weight: bold;
            font-size: 1.5em;
            display: flex;
            align-items: center;
        }
        .logo i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .user-info i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background-color: var(--card-background);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .card-header {
            font-size: 1.2em;
            color: var(--secondary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .card-header i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        .card-content {
            font-size: 2em;
            font-weight: bold;
            color: var(--primary-color);
        }
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .action-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .action-button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .action-button i {
            margin-right: 10px;
        }
        .section {
            background-color: var(--card-background);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h2 {
            color: var(--secondary-color);
            margin-top: 0;
        }
        .assistance-history {
            width: 100%;
            border-collapse: collapse;
        }
        .assistance-history th, .assistance-history td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        .assistance-history th {
            background-color: var(--primary-color);
            color: white;
        }
        .assistance-history tr:hover {
            background-color: #f5f5f5;
        }
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .status-completed {
            background-color: var(--success-color);
            color: white;
        }
        .status-ongoing {
            background-color: var(--warning-color);
            color: white;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background-color: var(--card-background);
            margin: 10% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #000;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--secondary-color);
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #2980b9;
        }
        @media screen and (min-width:0px) and (max-width: 608px) {
            /* .dashboard, .action-buttons {
                grid-template-columns: 1fr;
            } */
             body{
                background-color: #2ecc71;
             }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <i class="fas fa-car-side"></i>
            NTOUKS Automobiliste
        </div>
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>Collins Kanko</span>
        </div>
    </header>

    <div class="container">
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-history"></i>
                    Assistances totales
                </div>
                <div class="card-content">12</div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-car"></i>
                    Véhicules enregistrés
                </div>
                <div class="card-content">3</div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-star"></i>
                    Note moyenne
                </div>
                <div class="card-content">4.8</div>
            </div>
        </div>

        <div class="action-buttons">
            <button class="action-button" onclick="openModal()">
                <i class="fas fa-ambulance"></i><a  href="Demande d'assistance.php"> Demander une assistance</a>

            </button>
            <button class="action-button">
                <i class="fas fa-map-marker-alt"></i>Localiser les stations
            </button>
            <button class="action-button">
                <i class="fas fa-car"></i>Gérer mes véhicules
            </button>
            <button class="action-button">
                <i class="fas fa-cog"></i>Paramètres
            </button>
        </div>

        <div class="section">
            <h2>Historique des assistances</h2>
            <table class="assistance-history">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type de panne</th>
                        <th>Station</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>03/09/2024</td>
                        <td>Pneu crevé</td>
                        <td>Station Texaco Aéroport</td>
                        <td><span class="status status-completed">Terminé</span></td>
                    </tr>
                    <tr>
                        <td>15/08/2024</td>
                        <td>Batterie déchargée</td>
                        <td>Station Total Centre-ville</td>
                        <td><span class="status status-completed">Terminé</span></td>
                    </tr>
                    <tr>
                        <td>01/09/2024</td>
                        <td>Problème moteur</td>
                        <td>Garage Renault Ouest</td>
                        <td><span class="status status-ongoing">En cours</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="assistanceModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Demande d'assistance</h2>
            <form id="assistanceForm">
                <div class="form-group">
                    <label for="vehicleSelect">Sélectionnez votre véhicule :</label>
                    <select id="vehicleSelect" required>
                        <option value="">Choisissez un véhicule</option>
                        <option value="1">Renault Clio - AB-123-CD</option>
                        <option value="2">Peugeot 308 - EF-456-GH</option>
                        <option value="3">Citroën C3 - IJ-789-KL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="breakdownType">Type de panne :</label>
                    <select id="breakdownType" required>
                        <option value="">Sélectionnez le type de panne</option>
                        <option value="flat_tire">Pneu crevé</option>
                        <option value="battery">Batterie déchargée</option>
                        <option value="engine">Problème moteur</option>
                        <option value="fuel">Panne d'essence</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Votre localisation :</label>
                    <input type="text" id="location" placeholder="Adresse ou coordonnées GPS" required>
                </div>
                <div class="form-group">
                    <label for="description">Description du problème :</label>
                    <textarea id="description" rows="4" placeholder="Décrivez brièvement votre problème"></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer la demande</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('assistanceModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('assistanceModal').style.display = 'none';
        }

        document.getElementById('assistanceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ici, vous ajouteriez la logique pour envoyer la demande d'assistance
            alert('Votre demande d'assistance a été envoyée. Un mécanicien sera bientôt en route.');
            closeModal();
        });

        // Fermer le modal si l'utilisateur clique en dehors
        window.onclick = function(event) {
            if (event.target == document.getElementById('assistanceModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>