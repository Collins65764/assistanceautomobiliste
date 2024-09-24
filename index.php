<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roadside Assist</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="flex flex-col p-5 min-h-screen">
  <!-- Header -->
  <header class="bg-primary px-4 lg:px-6 h-14 flex items-center justify-between">
    <a class="flex items-center" href="#">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6 text-primary-foreground">
        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
        <circle cx="7" cy="17" r="2"></circle>
        <path d="M9 17h6"></path>
        <circle cx="17" cy="17" r="2"></circle>
      </svg>
      <span class="text-primary-foreground font-bold text-lg ml-2">Roadside Assist</span>
    </a>
    <nav class="hidden md:flex gap-4">
      <a class="text-sm font-medium text-primary-foreground hover:underline" href="connexion.php">Se connecter</a>
      <a class="text-sm font-medium text-primary-foreground hover:underline" href="inscription.php">S'incrire</a>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="flex-1">
    <!-- Hero Section -->
    <section class="py-12 px-5 mx-2 md:py-24 bg-background">
      <div class="container px-4 md:px-6">
        <div class="grid gap-6 lg:grid-cols-2">
          <div class="space-y-4">
            <h1 class="text-3xl font-bold tracking-tight text-foreground sm:text-5xl">Assistance automobile en un clic</h1>
            <p class="text-muted-foreground md:text-xl">Que vous soyez en panne, en accident ou besoin d'un remorquage, notre équipe est là pour vous aider 24/7.</p>
            <div class="flex flex-col gap-2 sm:flex-row">
              <a href="#" class="h-10 inline-flex items-center justify-center rounded-md bg-primary text-sm font-medium text-primary-foreground px-8 shadow hover:bg-primary/90">Télécharger l'app</a>
              <a href="#" class="h-10 inline-flex items-center justify-center rounded-md border border-input bg-background text-sm font-medium px-8 shadow-sm hover:bg-accent hover:text-accent-foreground">S'inscrire</a>
            </div>
          </div>
          <img src="/placeholder.svg" class="w-full rounded-xl object-cover" alt="Hero Image">
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section class="py-12 md:py-24 bg-muted">
      <div class="container px-4 md:px-6">
        <div class="text-center space-y-4">
          <h2 class="text-3xl font-bold text-foreground sm:text-5xl">Nos services</h2>
          <p class="text-muted-foreground md:text-xl">Nous intervenons rapidement pour des services de dépannage, remorquage et réparation 24/7.</p>
        </div>
        <div class="grid gap-6 py-12 lg:grid-cols-3">
          <div class="space-y-2">
            <h3 class="text-xl font-bold text-foreground">Dépannage</h3>
            <p class="text-muted-foreground">Nos équipes de dépannage interviennent rapidement pour vous remettre sur la route.</p>
          </div>
          <div class="space-y-2">
            <h3 class="text-xl font-bold text-foreground">Remorquage</h3>
            <p class="text-muted-foreground">Nous assurons le remorquage de votre véhicule vers le garage le plus proche.</p>
          </div>
          <div class="space-y-2">
            <h3 class="text-xl font-bold text-foreground">Réparation</h3>
            <p class="text-muted-foreground">Nos ateliers sont équipés pour résoudre tous vos problèmes mécaniques.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12 md:py-24 bg-background">
      <div class="container px-4 md:px-6 text-center">
        <h2 class="text-3xl font-bold text-foreground sm:text-5xl">Nos clients témoignent</h2>
        <p class="text-muted-foreground md:text-xl">Découvrez ce que nos clients pensent de notre service d'assistance automobile.</p>
        <div class="grid gap-6 max-w-5xl mx-auto py-12 sm:grid-cols-2 md:grid-cols-3">
          <div class="rounded-lg border bg-muted p-6">
            <h3 class="text-2xl font-semibold text-foreground">"Un service exceptionnel"</h3>
            <p class="text-muted-foreground">Problème de pneu en pleine nuit. Service rapide et professionnel.</p>
            <div class="flex items-center space-x-2 mt-4">
              <img src="/placeholder-user.jpg" alt="Julien Dupont" class="w-10 h-10 rounded-full">
              <div>
                <p class="text-sm font-medium text-foreground">Julien Dupont</p>
                <p class="text-xs text-muted-foreground">Client depuis 2 ans</p>
              </div>
            </div>
          </div>
          <div class="rounded-lg border bg-muted p-6">
            <h3 class="text-2xl font-semibold text-foreground">"Fiable et réactif"</h3>
            <p class="text-muted-foreground">Accident sur l'autoroute. Remorquage rapide et efficace.</p>
            <div class="flex items-center space-x-2 mt-4">
              <img src="/placeholder-user.jpg" alt="Marie Lefebvre" class="w-10 h-10 rounded-full">
              <div>
                <p class="text-sm font-medium text-foreground">Marie Lefebvre</p>
                <p class="text-xs text-muted-foreground">Cliente depuis 3 ans</p>
              </div>
            </div>
          </div>
          <div class="rounded-lg border bg-muted p-6">
            <h3 class="text-2xl font-semibold text-foreground">"Une équipe au top"</h3>
            <p class="text-muted-foreground">Problème de batterie résolu rapidement. Très professionnels.</p>
            <div class="flex items-center space-x-2 mt-4">
              <img src="/placeholder-user.jpg" alt="Pierre Leroy" class="w-10 h-10 rounded-full">
              <div>
                <p class="text-sm font-medium text-foreground">Pierre Leroy</p>
                <p class="text-xs text-muted-foreground">Client depuis 1 an</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Signup Section -->
    <section class="py-12 md:py-24 bg-muted">
      <div class="container px-4 md:px-6 text-center">
        <h2 class="text-3xl font-bold text-foreground sm:text-5xl">Rejoignez-nous</h2>
        <p class="text-muted-foreground md:text-xl">Téléchargez notre application pour bénéficier de notre service d'assistance 24/7.</p>
        <form class="flex gap-2 justify-center mt-4 max-w-lg mx-auto">
          <input type="email" placeholder="Entrez votre email" class="w-full rounded-md border px-3 py-2 shadow-sm bg-background text-foreground placeholder-muted-foreground focus:ring focus:ring-primary">
          <button class="h-10 inline-flex items-center justify-center rounded-md bg-primary text-primary-foreground px-4 text-sm font-medium shadow hover:bg-primary/90">S'inscrire</button>
        </form>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-muted py-6 text-center text-sm text-muted-foreground">
    <p>&copy; 2024 Roadside Assist. Tous droits réservés.</p>
  </footer>
</div>
</body>
</html>
