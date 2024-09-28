<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistance Pro en cas de panne automobile</title>
    <!-- Lien vers la feuille de style CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Inclusion de Font Awesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <!-- En-tête avec navigation -->
    <header>
        <nav id="main-nav">
            <!-- Logo et nom de l'entreprise -->
            <div class="logo">
                <img src="/placeholder.svg?height=50&width=50" alt="Logo Assistance Auto">
                <span>AssistAuto Pro</span>
            </div>
            <!-- Liens de navigation -->
            <ul class="nav-links">
                <li><a href="#accueil">Accueil</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#temoignages">Témoignages</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <!-- Bouton hamburger pour la navigation mobile -->
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    <main>
        <!-- Section d'accueil (hero) -->
        <section id="accueil" class="hero">
            <h1>Assistance Professionnelle en cas de Panne</h1>
            <p>Votre partenaire de confiance sur la route, 24/7</p>
            <a href="#contact" class="cta-button">Besoin d'aide ?</a>
        </section>

        <!-- Section des services -->
        <section id="services">
            <h2>Nos Services</h2>
            <div class="services-grid">
                <!-- Cartes de service individuelles -->
                <div class="service-card">
                    <i class="fas fa-wrench"></i>
                    <h3>Dépannage sur place</h3>
                    <p>Intervention rapide pour les pannes mineures, où que vous soyez.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-truck-pickup"></i>
                    <h3>Remorquage</h3>
                    <p>Transport sécurisé de votre véhicule vers le garage le plus proche.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-clock"></i>
                    <h3>Assistance 24/7</h3>
                    <p>Notre équipe est disponible jour et nuit, 365 jours par an.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-car-battery"></i>
                    <h3>Batterie à plat</h3>
                    <p>Redémarrage rapide ou remplacement de batterie sur place.</p>
                </div>
            </div>
        </section>

        <!-- Section des témoignages -->
        <section id="temoignages">
            <h2>Ce que disent nos clients</h2>
            <div class="testimonial-slider">
                <!-- Témoignages individuels -->
                <div class="testimonial">
                    <p>"Service rapide et efficace. Ils m'ont sauvé lors d'une panne sur l'autoroute !"</p>
                    <cite>- Marie D.</cite>
                </div>
                <div class="testimonial">
                    <p>"Professionnels et courtois. Je recommande vivement leurs services."</p>
                    <cite>- Thomas L.</cite>
                </div>
                <div class="testimonial">
                    <p>"Intervention en moins de 30 minutes. Impressionnant !"</p>
                    <cite>- Sophie M.</cite>
                </div>
            </div>
        </section>

        <!-- Section de contact -->
        <section id="contact">
            <h2>Contactez-nous</h2>
            <div class="contact-container">
                <!-- Formulaire de contact -->
                <form id="contact-form">
                    <input type="text" name="name" placeholder="Votre nom" required>
                    <input type="email" name="email" placeholder="Votre email" required>
                    <textarea name="message" placeholder="Votre message" required></textarea>
                    <button type="submit">Envoyer</button>
                </form>
                <!-- Informations de contact -->
                <div class="contact-info">
                    <h3>Numéro d'urgence</h3>
                    <p class="phone">01 23 45 67 89</p>
                    <h3>Adresse</h3>
                    <p>123 Rue de l'Assistance, 75000 Paris</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Pied de page -->
    <footer>
        <div class="footer-content">
            <!-- Section À propos -->
            <div class="footer-section">
                <h4>À propos</h4>
                <p>AssistAuto Pro, votre partenaire de confiance pour l'assistance automobile depuis 2005.</p>
            </div>
            <!-- Liens rapides -->
            <div class="footer-section">
                <h4>Liens rapides</h4>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#temoignages">Témoignages</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!-- Liens sociaux -->
            <div class="footer-section">
                <h4>Suivez-nous</h4>
                <div class="social-icons">
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-bottom">
            <p>&copy; 2024 AssistAuto Pro. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Lien vers le fichier JavaScript -->
    <script src="script.js"></script>
</body>
</html>