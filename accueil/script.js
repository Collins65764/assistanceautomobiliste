document.addEventListener('DOMContentLoaded', () => {
    // Sélection des éléments du DOM
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    // Gestion de la navigation responsive
    burger.addEventListener('click', () => {
        // Basculer la classe nav-active pour afficher/masquer le menu
        nav.classList.toggle('nav-active');

        // Animation des liens de navigation
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        });

        // Animation du bouton hamburger
        burger.classList.toggle('toggle');
    });

    // Défilement fluide pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Gestion du slider de témoignages
    const testimonials = document.querySelectorAll('.testimonial');
    let currentTestimonial = 0;

    // Fonction pour afficher un témoignage spécifique
    function showTestimonial(index) {
        testimonials.forEach((testimonial, i) => {
            testimonial.style.display = i === index ? 'block' : 'none';
        });
    }

    // Fonction pour passer au témoignage suivant
    function nextTestimonial() {
        currentTestimonial = (currentTestimonial + 1) % testimonials.length;
        showTestimonial(currentTestimonial);
    }

    // Initialisation du slider et démarrage de l'intervalle
    showTestimonial(currentTestimonial);
    setInterval(nextTestimonial, 5000); // Change de témoignage toutes les 5 secondes

    // Gestion du formulaire de contact
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Ici, vous pouvez ajouter la logique pour envoyer le formulaire
        // Par exemple, en utilisant fetch pour envoyer les données à un serveur
        console.log('Formulaire soumis');
        contactForm.reset(); // Réinitialise le formulaire après soumission
        alert('Merci pour votre message. Nous vous contacterons bientôt.');
    });

    // Fonction pour vérifier si un élément est dans la vue
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Fonction pour gérer l'animation au défilement
    function handleScrollAnimation() {
        const elements = document.querySelectorAll('.service-card, .testimonial');
        elements.forEach(el => {
            if (isElementInViewport(el)) {
                el.classList.add('animate');
            }
        });
    }

    // Ajout de l'écouteur d'événement pour le défilement
    window.addEventListener('scroll', handleScrollAnimation);
    // Vérification initiale des éléments visibles
    handleScrollAnimation();
});