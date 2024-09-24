<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interventions en Cours - Station Service</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e67e22;
            --background-color: #ecf0f1;
            --text-color: #333;
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .intervention-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .intervention-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .intervention-card:hover {
            transform: translateY(-5px);
        }

        .intervention-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .intervention-title {
            font-size: 1.2em;
            font-weight: bold;
        }

        .intervention-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
            background-color: var(--accent-color);
            color: white;
        }

        .intervention-details p {
            margin-bottom: 5px;
        }

        .intervention-progress {
            margin-top: 15px;
        }

        progress {
            width: 100%;
            height: 20px;
        }

        .intervention-actions {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 0.9em;
        }

        .btn-terminer {
            background-color: #27ae60;
            color: white;
        }

        .btn-details {
            background-color: var(--secondary-color);
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .intervention-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Interventions en Cours</h1>
    </header>

    <div class="container">
        <div class="intervention-list" id="interventionList">
            <!-- Les interventions seront insérées ici par JavaScript -->
        </div>
    </div>

    <script>
        const interventions = [
            { id: 1, mecanicien: "Luc Dupuis", client: "Jean Dupont", vehicule: "Peugeot 308", probleme: "Panne de batterie", progression: 75 },
            { id: 2, mecanicien: "Sophie Martin", client: "Marie Martin", vehicule: "Renault Clio", probleme: "Crevaison", progression: 90 },
            { id: 3, mecanicien: "Ahmed Benali", client: "Pierre Durand", vehicule: "Citroën C3", probleme: "Moteur qui cale", progression: 40 },
        ];

        function renderInterventions() {
            const interventionList = document.getElementById('interventionList');
            interventionList.innerHTML = interventions.map(intervention => `
                <div class="intervention-card">
                    <div class="intervention-header">
                        <span class="intervention-title">${intervention.mecanicien}</span>
                        <span class="intervention-status">En cours</span>
                    </div>
                    <div class="intervention-details">
                        <p><i class="fas fa-user"></i> Client: ${intervention.client}</p>
                        <p><i class="fas fa-car"></i> ${intervention.vehicule}</p>
                        <p><i class="fas fa-wrench"></i> ${intervention.probleme}</p>
                    </div>
                    <div class="intervention-progress">
                        <p>Progression: ${intervention.progression}%</p>
                        <progress value="${intervention.progression}" max="100"></progress>
                    </div>
                    <div class="intervention-actions">
                        <button class="btn btn-terminer" onclick="terminerIntervention(${intervention.id})">Terminer</button>
                        <button class="btn btn-details" onclick="voirDetails(${intervention.id})">Détails</button>
                    </div>
                </div>
            `).join('');
        }

        function terminerIntervention(id) {
            alert(`Terminer l'intervention ${id}`);
        }

        function voirDetails(id) {
            alert(`Voir les détails de l'intervention ${id}`);
        }

        renderInterventions();
    </script>
</body>
</html>