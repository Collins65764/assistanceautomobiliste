<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mécaniciens Disponibles - Station Service</title>
    <style>
        :root {
            --primary-color: #2b6777;
            --secondary-color: #52ab98;
            --accent-color: #f47a60;
            --background-color: #f0f0f0;
            --card-background: #ffffff;
            --text-color: #333333;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1rem;
            margin-bottom: 2rem;
        }
        h1 {
            margin-bottom: 0.5rem;
        }
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .search-bar {
            flex-grow: 1;
            margin-right: 1rem;
        }
        .search-bar input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .filter-options select {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        .mechanic-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .mechanic-card {
            background-color: var(--card-background);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .mechanic-card:hover {
            transform: translateY(-5px);
        }
        .mechanic-card-header {
            background-color: var(--secondary-color);
            color: white;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .mechanic-card-body {
            padding: 15px;
        }
        .mechanic-info {
            margin-bottom: 10px;
        }
        .mechanic-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-top: 10px;
        }
        .status-available {
            background-color: #4CAF50;
            color: white;
        }
        .status-busy {
            background-color: var(--accent-color);
            color: white;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .btn-assign {
            background-color: var(--accent-color);
            color: white;
        }
        .btn-assign:hover {
            background-color: #e56950;
        }
        .btn-details {
            background-color: var(--secondary-color);
            color: white;
        }
        .btn-details:hover {
            background-color: #429780;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .pagination button {
            margin: 0 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .filters {
                flex-direction: column;
                align-items: stretch;
            }
            .search-bar {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            .filter-options select {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            .mechanic-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Mécaniciens Disponibles</h1>
        <p>Station Service - Tableau de Bord</p>
    </header>
    <div class="container">
        <div class="filters">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un mécanicien...">
            </div>
            <div class="filter-options">
                <select>
                    <option value="">Toutes les spécialités</option>
                    <option value="general">Mécanique générale</option>
                    <option value="electrique">Électricité auto</option>
                    <option value="pneumatique">Pneumatiques</option>
                    <option value="carrosserie">Carrosserie</option>
                </select>
                <select>
                    <option value="">Tous les statuts</option>
                    <option value="available">Disponible</option>
                    <option value="busy">En intervention</option>
                </select>
            </div>
        </div>
        <div class="mechanic-grid">
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>Mapanda Lionnel</span>
                    <span class="mechanic-status status-available">Disponible</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Mécanique générale</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 8 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 03/09/2024 13:45</div>
                    <a href="#" class="btn btn-assign">Assigner</a>
                    <a href="details mapanda mecanicien.php" class="btn btn-details">Détails</a>
                </div>
            </div>
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>Poutchoko miguel</span>
                    <span class="mechanic-status status-busy">En intervention</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Électricité auto</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 5 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 03/09/2024 14:30</div>
                    <a href="#" class="btn btn-assign" style="opacity: 0.5; cursor: not-allowed;">Assigner</a>
                    <a href="details poutchoko mecanicien.php" class="btn btn-details">Détails</a>
                </div>
            </div>
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>Tagne jean</span>
                    <span class="mechanic-status status-available">Disponible</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Pneumatiques</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 3 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 02/07/2024 11:30</div>
                    <a href="#" class="btn btn-assign">Assigner</a>
                    <a href="details tagne mecanicien.php" class="btn btn-details">Détails</a>
                </div>
            </div>
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>wafo armel</span>
                    <span class="mechanic-status status-available">Disponible</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Carrosserie</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 6 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 03/09/2024 11:00</div>
                    <a href="#" class="btn btn-assign">Assigner</a>
                    <a href="#" class="btn btn-details">Détails</a>
                </div>
            </div>
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>kamga nicolas</span>
                    <span class="mechanic-status status-busy">En intervention</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Mécanique générale</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 4 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 03/09/2024 15:00</div>
                    <a href="#" class="btn btn-assign" style="opacity: 0.5; cursor: not-allowed;">Assigner</a>
                    <a href="#" class="btn btn-details">Détails</a>
                </div>
            </div>
            <div class="mechanic-card">
                <div class="mechanic-card-header">
                    <span>Bameya junior</span>
                    <span class="mechanic-status status-available">Disponible</span>
                </div>
                <div class="mechanic-card-body">
                    <div class="mechanic-info"><strong>Spécialité:</strong> Électricité auto</div>
                    <div class="mechanic-info"><strong>Expérience:</strong> 7 ans</div>
                    <div class="mechanic-info"><strong>Dernière intervention:</strong> 03/09/2024 10:30</div>
                    <a href="#" class="btn btn-assign">Assigner</a>
                    <a href="#" class="btn btn-details">Détails</a>
                </div>
            </div>
        </div>
        <div class="pagination">
            <button>&lt; Précédent</button>
            <button>Suivant &gt;</button>
        </div>
    </div>
</body>
    </html>