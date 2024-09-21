<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Mécanicien - Tableau de Bord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-weight: bold;
            font-size: 1.2em;
        }
        .user-actions a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }
        .container {
            display: flex;
            height: calc(100vh - 50px);
        }
        .sidebar {
            width: 200px;
            background-color: #34495e;
            color: white;
            padding: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .dashboard {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .dashboard-item {
            background-color: #3498db;
            color: white;
            padding: 15px;
            border-radius: 5px;
            width: 23%;
            text-align: center;
        }
        .dashboard-item h3 {
            margin: 0;
            font-size: 2em;
        }
        .dashboard-item p {
            margin: 5px 0 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        .status {
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.9em;
        }
        .pending {
            background-color: #f39c12;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.9em;
        }
        .btn-primary {
            background-color: #2980b9;
            color: white;
        }
        .btn-secondary {
            background-color: #7f8c8d;
            color: white;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">Interface Mécanicien</div>
        <div class="user-actions">
            <a href="#profil">Profil</a>
            <a href="#notifications">Notifications</a>
            <a href="#deconnexion">Déconnexion</a>
        </div>
    </header>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="#tableau-de-bord">Tableau de bord</a></li>
                <li><a href="#demandes">Demandes d'assistance</a></li>
                <li><a href="#interventions">Mes interventions</a></li>
                <li><a href="#historique">Historique</a></li>
                <li><a href="#statistiques">Statistiques</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <div class="dashboard">
                <div class="dashboard-item">
                    <h3>5</h3>
                    <p>Demandes en attente</p>
                </div>
                <div class="dashboard-item">
                    <h3>2</h3>
                    <p>Interventions en cours</p>
                </div>
                <div class="dashboard-item">
                    <h3>15</h3>
                    <p>Interventions terminées</p>
                </div>
                <div class="dashboard-item">
                    <h3>97%</h3>
                    <p>Taux de satisfaction</p>
                </div>
            </div>
            <h2>Dernières demandes d'assistance</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                        <td>Pneu crevé</td>
                        <td>texaco aeroport</td>
                        <td><span class="status pending">En attente</span></td>
                        <td>
                            <button class="btn btn-primary">Accepter</button>
                            <button class="btn btn-secondary">Détails</button>
                        </td>
                    </tr>
                    <!-- Ajoutez d'autres lignes ici pour plus de demandes -->
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>