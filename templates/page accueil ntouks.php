<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTOUKS - Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-weight: bold;
            font-size: 1.5em;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 1.1em;
        }
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .carousel {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            height: 400px;
        }
        .carousel-item {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .carousel-item.active {
            opacity: 1;
        }
        .carousel-item img {
            max-width: 3000%;
            max-height: 500px;
            object-fit: cover;
        }
        .carousel-item h2 {
            margin-top: 20px;
            font-size: 2em;
        }
        .carousel-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .carousel-nav button {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
        }
        .features {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .feature {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(33% - 20px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .feature h3 {
            color: #2c3e50;
        }
        @media (max-width: 768px) {
            .feature {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">NTOUKS</div>
        <nav class="nav-links">
            <a href="#accueil">Accueil</a>
            <a href="#services">Services</a>
            <a href="#apropos">À propos</a>
            <a href="#contact">Contact</a>
            <a href="Inscription Ntouks.html">S'inscrire</a>
        </nav>
    </header>

    <main class="main-content">
        <div class="carousel">
            <div class="carousel-item active">
                <img src="Image/image4.jpg" alt="Image 4">
                <h2>Bienvenue sur WZB</h2>
            </div>
            <div class="carousel-item">
                <img src="Image/image 1.jpg" alt="Image 1">
                <h2>Nos services de qualité</h2>
            </div>
            <div class="carousel-item">
                <img src="Image/image 3.jpg" alt="Image 3">
                <h2>Une équipe à votre écoute</h2>
            </div>
            <div class="carousel-nav">
                <button onclick="changeSlide(-1)">Précédent</button>
                <button onclick="changeSlide(1)">Suivant</button>
            </div>
        </div>

        <div class="features">
            <div class="feature">
                <h3>Service rapide</h3>
                <p>Nos équipes interviennent dans les plus brefs délais pour vous dépanner.</p>
            </div>
            <div class="feature">
                <h3>Expertise technique</h3>
                <p>Nos mécaniciens sont formés aux dernières technologies automobiles.</p>
            </div>
            <div class="feature">
                <h3>Disponibilité 24/7</h3>
                <p>Nous sommes à votre service à tout moment, jour et nuit.</p>
            </div>
        </div>
    </main>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');

        function changeSlide(direction) {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + direction + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        // Changer de slide automatiquement toutes les 5 secondes
        setInterval(() => changeSlide(1), 5000);
    </script>
</body>
</html>