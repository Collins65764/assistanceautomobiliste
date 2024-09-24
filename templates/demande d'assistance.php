<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'Assistance - Automobiliste</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #1a5f7a;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        main {
            max-width: 600px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-top: 1rem;
            position: relative;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.5rem 0.5rem 0.5rem 2rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group i {
            position: absolute;
            left: 0.5rem;
            top: 2.3rem;
            color: #1a5f7a;
        }
        button {
            background-color: #ff6b6b;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 1rem;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff5252;
        }
    </style>
</head>
<body>
    <header>
        <h1>Demande d'Assistance Automobile</h1>
    </header>
    <main>
        <form id="assistanceForm">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <i class="fas fa-user"></i>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="telephone">Numéro de téléphone :</label>
                <i class="fas fa-phone"></i>
                <input type="tel" id="telephone" name="telephone" required>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation (adresse ou coordonnées GPS) :</label>
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" id="localisation" name="localisation" required>
            </div>

            <div class="form-group">
                <label for="typePanne">Type de panne :</label>
                <i class="fas fa-tools"></i>
                <select id="typePanne" name="typePanne" required>
                    <option value="">Sélectionnez le type de panne</option>
                    <option value="moteur">Problème moteur</option>
                    <option value="batterie">Batterie</option>
                    <option value="pneu">Pneu crevé</option>
                    <option value="carburant">Panne de carburant</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descriptionPanne">Description détaillée du problème :</label>
                <i class="fas fa-comment-alt"></i>
                <textarea id="descriptionPanne" name="descriptionPanne" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="marqueVoiture">Marque de la voiture :</label>
                <i class="fas fa-car"></i>
                <input type="text" id="marqueVoiture" name="marqueVoiture" required>
            </div>

            <div class="form-group">
                <label for="modeleVoiture">Modèle de la voiture :</label>
                <i class="fas fa-info-circle"></i>
                <input type="text" id="modeleVoiture" name="modeleVoiture" required>
            </div>

            <button type="submit"><i class="fas fa-paper-plane"></i> Envoyer la demande d'assistance</button>
        </form>
    </main>
    <script>
        document.getElementById('assistanceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Ici, vous ajouteriez le code pour envoyer les données du formulaire à votre backend
            alert('Demande d'assistance envoyée ! Nous vous contacterons rapidement.');
        });
    </script>
</body>
</html>