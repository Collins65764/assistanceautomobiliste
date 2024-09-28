<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Amélioré du Réceptionniste - Demandes d'Assistance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #34495e;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: var(--light-color);
        }
        
        .header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        .header h1 {
            margin-bottom: 0.5rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 80px auto 20px;
            padding: 20px;
        }
        
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card h2 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .demand-list {
            max-height: 400px;
            overflow-y: auto;
        }
        
        .demand-item {
            background-color: var(--light-color);
            border-radius: 4px;
            margin-bottom: 10px;
            padding: 10px;
            transition: background-color 0.3s ease;
        }
        
        .demand-item:hover {
            background-color: #d5dbdb;
        }
        
        .demand-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .demand-title {
            font-weight: bold;
        }
        
        .demand-status {
            font-size: 0.8em;
            padding: 3px 8px;
            border-radius: 12px;
            color: white;
        }
        
        .status-pending {
            background-color: var(--warning-color);
        }
        
        .status-assigned {
            background-color: var(--success-color);
        }
        
        .demand-details {
            font-size: 0.9em;
            color: var(--dark-color);
        }
        
        .demand-actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 0.9em;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-view {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-assign {
            background-color: var(--success-color);
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
        }
        
        .search-bar {
            margin-bottom: 20px;
        }
        
        .search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="Interface station service.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <h1>Dashboard du Réceptionniste</h1>
        <p>Demandes d'Assistance Automobile</p>
    </header>
    
    <div class="container">
        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Rechercher une demande...">
        </div>
        
        <div class="dashboard">
            <div class="card">
                <h2>Dernières Demandes</h2>
                <div class="demand-list" id="demandList">
                    <!-- Les demandes seront insérées ici par JavaScript -->
                </div>
            </div>
            
            <div class="card">
                <h2>Statistiques</h2>
                <div id="stats">
                    <!-- Les statistiques seront insérées ici par JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Données simulées des demandes d'assistance
        const demands = [
            { id: 1, name: "Ngueleu isidore", problem: "Panne de batterie", carModel: "Peugeot 308", status: "En attente" },
            { id: 2, name: "Touani Joll", problem: "Crevaison", carModel: "Renault Clio", status: "Assigné" },
            { id: 3, name: "Nouapon Arthur", problem: "Arret brusque du vehicule", carModel: "Citroën C3", status: "En attente" },
            { id: 4, name: "Mingue kamga", problem: "Problème de freins", carModel: "Ford Fiesta", status: "Assigné" },
            { id: 5, name: "Tchamago herman", problem: "Panne d'alternateur", carModel: "MercedesML350", status: "En attente" },
        ];

        function renderDemands(demandsToRender) {
            const demandList = document.getElementById('demandList');
            demandList.innerHTML = demandsToRender.map(demand => `
                <div class="demand-item">
                    <div class="demand-header">
                        <span class="demand-title">${demand.name} - ${demand.carModel}</span>
                        <span class="demand-status status-${demand.status.toLowerCase()}">${demand.status}</span>
                    </div>
                    <div class="demand-details">
                        <p>Problème: ${demand.problem}</p>
                    </div>
                    <div class="demand-actions">
    <a href="Details demande assistance.php?id=${demand.id}" class="btn btn-view">
        <i class="fas fa-eye"></i> Voir
    </a>
    <a href="page mecanicien disponible.php" class="btn btn-assign">
        <i class="fas fa-user-plus"></i> Assigner
    </a>
</div>
                </div>
            `).join('');
        }

        function renderStats() {
            const stats = document.getElementById('stats');
            const totalDemands = demands.length;
            const pendingDemands = demands.filter(d => d.status === "En attente").length;
            const assignedDemands = demands.filter(d => d.status === "Assigné").length;

            stats.innerHTML = `
                <p>Total des demandes: ${totalDemands}</p>
                <p>Demandes en attente: ${pendingDemands}</p>
                <p>Demandes assignées: ${assignedDemands}</p>
            `;
        }

        function viewDemand(id) {
            alert(`Voir les détails de la demande ${id}`);
        }

        function assignDemand(id) {
            alert(`Assigner la demande ${id} à un mécanicien`);
        }

        function initSearchFunctionality() {
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const filteredDemands = demands.filter(demand => 
                    demand.name.toLowerCase().includes(searchTerm) ||
                    demand.problem.toLowerCase().includes(searchTerm) ||
                    demand.carModel.toLowerCase().includes(searchTerm)
                );
                renderDemands(filteredDemands);
            });
        }

        // Initialiser l'affichage
        renderDemands(demands);
        renderStats();
        initSearchFunctionality();
    </script>
</body>
</html>