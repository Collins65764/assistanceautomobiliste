 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Station Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #1a5f7a;
            --secondary-color: #2c8eb3;
            --accent-color: #ff6b6b;
            --bg-color: #f0f0f0;
            --text-color: #333;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            max-width: 50px;
            margin-right: 1rem;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }
        nav ul li {
            margin-left: 1rem;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        main {
            display: flex;
            padding: 1rem;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            height: calc(100vh - 80px);
            position: sticky;
            top: 1rem;
        }
        .sidebar h2 {
            margin-top: 0;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 0.5rem;
        }
        .sidebar ul li a {
            color: var(--text-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: var(--bg-color);
        }
        .sidebar ul li a i {
            margin-right: 0.5rem;
            color: var(--secondary-color);
        }
        .content {
            flex-grow: 1;
            margin-left: 1rem;
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
        }
        .dashboard-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            
        }
        .summary-card {
            background-color: var(--secondary-color);
            color: white;
            padding: 1rem;
            border-radius: 5px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .summary-card:hover {
            transform: translateY(-5px);
        }
        .summary-card h3 {
            margin-top: 0;
            font-size: 1.1rem;
        }
        .summary-card p {
            font-size: 2rem;
            margin: 0.5rem 0;
        }
        .chart-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .chart {
            width: 48%;
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: var(--secondary-color);
            color: white;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        .status {
            padding: 0.25rem 0.5rem;
            border-radius: 3px;
            font-weight: bold;
        }
        .status-waiting {
            background-color: var(--warning-color);
            color: #856404;
        }
        .status-assigned {
            background-color: var(--success-color);
            color: white;
        }
        .status-completed {
            background-color: var(--primary-color);
            color: white;
        }
        .action-buttons button {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .action-buttons button:hover {
            background-color: #ff5252;
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
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media screen and (min-width:0px) and (max-width:900px) {
            body{
                background-color: #28a745;

            }
            .dashboard-summary {
            display: flex;
            flex-direction: column;
            justify-content: initial;
            align-items: center;
            margin-bottom: 1rem;
           
            
            
        }
        .chart-container{
            flex-direction: column;
            align-items: center;
        }
        table{
            display: none;
        }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/image entreprise/N.png" alt="N.png" width="20px" height="30px">
            <h1>Station Service - Tableau de Bord</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-user"></i> Profil</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
                <li><a href="page accueil ntouks.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a></li>
                <li><a href="reception demande assistance.php"><i class="fas fa-list"></i> Demandes d'assistance</a></li>
                <li><a href="page mecanicien disponible.php"><i class="fas fa-users"></i> Mécaniciens</a></li>
                <li><a href="#"><i class="fas fa-history"></i> Historique</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Statistiques</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
            </ul>
        </aside>
        <section class="content">
            <div class="dashboard-summary">
                <div class="summary-card">
                    <h3>Demandes en attente</h3>
                    <p>5</p>
                    <small>+2 depuis hier</small>
                </div>
                <div class="summary-card">
                    <h3><a href="intervention  mecanicien en cours.php"class="#">Interventions en cours</a></h3>
                    <p>3</p>
                    <small>-1 depuis hier</small>
            
                </div>
                <div class="summary-card">
                    <h3>Mécaniciens disponibles</h3>
                    <p>7</p>
                    <small>Inchangé</small>
                </div>
                <div class="summary-card">
                    <h3>Taux de satisfaction</h3>
                    <p>98%</p>
                    <small>+2% ce mois</small>
                </div>
            </div>
            <div class="chart-container">
                <div class="chart">
                    <canvas id="demandesChart"></canvas>
                </div>
                <div class="chart">
                    <canvas id="satisfactionChart"></canvas>
                </div>
            </div>
            <h2>Dernières demandes d'assistance</h2>
            <table>
                <thead>
                    <tr>
                        <th>numero</th>
                        <th>Date/Heure</th>
                        <th>Client</th>
                        <th>Type de panne</th>
                        <th>Localisation</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>03/09/2024 14:30</td>
                        <td>Touani joll</td>
                        <td>Crevaison</td>
                        <td>texaco aeroport</td>
                        <td><span class="status status-waiting">En attente</span></td>
                        <td class="action-buttons">
                            <button onclick="openModal('001')">Assigner</button>
                            <button onclick="showDetails('001')">Détails</button>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>03/09/2024 15:15</td>
                        <td>Ngueleu isidore</td>
                        <td>Batterie</td>
                        <td>Bali nouveau mont cameroun</td>
                        <td><span class="status status-assigned">Assigné</span></td>
                        <td class="action-buttons">
                            <button onclick="showDetails('002')">Détails</button>
                        </td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>03/09/2024 16:00</td>
                        <td>Nouapon Arthur</td>
                        <td>arret brusque du vehicule</td>
                        <td>entrée garage chinois yassa</td>
                        <td><span class="status status-completed">Terminé</span></td>
                        <td class="action-buttons">
                            <button onclick="showDetails('003')">Détails</button>
                        </td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>03/09/2024 16:00</td>
                        <td>Mingue kamga</td>
                        <td>Probleme de freins</td>
                        <td>Santa lucia bonamoussadi</td>
                        <td><span class="status status-completed">Terminé</span></td>
                        <td class="action-buttons">
                            <button onclick="showDetails('003')">Détails</button>
                        </td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>03/09/2024 16:00</td>
                        <td>Tchamago herman</td>
                        <td>Probleme d'alternateurs</td>
                        <td>Zone industrielle</td>
                        <td><span class="status status-completed">Terminé</span></td>
                        <td class="action-buttons">
                            <button onclick="showDetails('003')">Détails</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <div id="assignModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Assigner un mécanicien</h2>
            <p>Demande ID: <span id="requestId"></span></p>
            <select id="mechanicSelect">
                <option value="">Sélectionnez un mécanicien</option>
                <option value="1">Michel Lefebvre</option>
                <option value="2">Sophie Garcia</option>
                <option value="3">Luc Dubois</option>
            </select>
            <button onclick="assignMechanic()">Confirmer l'assignation</button>
        </div>
    </div>

    <script>
        // Graphique des demandes
        var ctxDemandes = document.getElementById('demandesChart').getContext('2d');
        var demandesChart = new Chart(ctxDemandes, {
            type: 'bar',
            data: {
                labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                datasets: [{
                    label: 'Demandes par jour',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: 'rgba(44, 142, 179, 0.6)',
                    borderColor: 'rgba(44, 142, 179, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
""
        // Graphique de satisfaction
        var ctxSatisfaction = document.getElementById('satisfactionChart').getContext('2d');
        var satisfactionChart = new Chart(ctxSatisfaction, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Taux de satisfaction (%)',
                    data: [95, 96, 94, 97, 96, 98],
                    borderColor: 'rgba(255, 107, 107, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 90,
                        max: 100
                    }
                }
            }
        });

        // Fonctions pour la modal
        var modal = document.getElementById("assignModal");
        var span = document.getElementsByClassName("close")[0];

        function openModal(id) {
            modal.style.display = "block";
            document.getElementById("requestId").textContent = id;
        }

        span.onclick = function() {
            modal.style.display = "none";
         }
    </script>
</body>
</html>