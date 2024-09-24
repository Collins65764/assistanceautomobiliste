<?php
include 'functions/register.func.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ntouks";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['submit'])) {
  $full_name = $_POST['floating_full_name'];
  $phone = $_POST['floating_phone'];
  $email = $_POST['floating_email'];
  $password = $_POST['floating_password'];
  $repeat_password = $_POST['repeat_password'];

  // Vérification des champs
  if (empty($full_name) || empty($phone) || empty($email) || empty($password) || empty($repeat_password)) {
    $error = "Tous les champs sont obligatoires.";
  } elseif ($password !== $repeat_password) {
    $error = "Les mots de passe ne correspondent pas.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "L'adresse e-mail n'est pas valide.";
  } else {
    // Tentative d'inscription
    global $conn;
    $result = registerUser($conn, $full_name, $email, $password, $phone);    if ($result === "Enregistrement réussi.") {
      // Redirection vers la page de succès
      header("Location: succes.php");
      exit();
    } else {
      $error = $result;
    }
  }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="scripts/tailwind.js"></script>
  <script>
    // Fonction pour valider l'email
    function isValidEmail(email) {
      const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }

    document.addEventListener('DOMContentLoaded', function () {
      const form = document.querySelector('form');
      const errorDiv = document.createElement('div');
      errorDiv.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 hidden';
      errorDiv.setAttribute('role', 'alert');
      form.prepend(errorDiv);

      form.addEventListener('submit', function (event) {
        event.preventDefault();
        errorDiv.classList.add('hidden');

        const full_name = form.querySelector('#floating_full_name').value.trim();
        const phone = form.querySelector('#floating_phone').value.trim();
        const email = form.querySelector('#floating_email').value.trim();
        const password = form.querySelector('#floating_password').value;
        const repeat_password = form.querySelector('#floating_repeat_password').value;

        let errors = [];

        if (!full_name) errors.push("Le nom complet est requis.");
        if (!isValidEmail(email)) errors.push("L'adresse e-mail n'est pas valide.");
        if (password.length < 8) errors.push("Le mot de passe doit contenir au moins 8 caractères.");
        if (password !== repeat_password) errors.push("Les mots de passe ne correspondent pas.");

        if (errors.length > 0) {
          errorDiv.innerHTML = errors.join('<br>');
          errorDiv.classList.remove('hidden');
        } else {
          form.submit();
        }
      });
    });
  </script>
</head>

<body>

  <section class="flex flex-col items-center h-screen justify-center">
    <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
      NTOUKS <span class="text-black p-2 bg-yellow-500">Auto</span>Inscription
    </a>
    <form class="max-w-md mx-auto" method="POST">
      <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="floating_full_name" id="floating_full_name"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " required />
        <label for="floating_full_name"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom
          complet</label>
      </div>
      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
          <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" name="floating_phone" id="floating_phone"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
          <label for="floating_phone"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro
            de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <input type="email" name="floating_email" id="floating_email"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
          <label for="floating_email"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse
            e-mail</label>
        </div>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="floating_password" id="floating_password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " required />
        <label for="floating_password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot
          de passe</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="repeat_password" id="floating_repeat_password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " required />
        <label for="floating_repeat_password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmer
          le mot de passe</label>
      </div>

      <div class="grid md:grid-cols-2 md:gap-6">
      </div>
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Soumettre</button>
    </form>
  </section>
</body>

</html>