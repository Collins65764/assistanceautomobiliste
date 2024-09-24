<?php
//parametre de connexion a la base de données
$host = 'localhost';// adresse du serveur de donnees
$dbname= 'ntouks';//Nom de la db
$username= 'root';//Nom du user avec lequel on se connecte
$password= '';//le password du user

//on va tenter une connexion a la db avec try__catch
try {
    //dans cette partie si y a une erreur ca va enclencher une exception
    
    $pdo= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
} catch (PDOException $e) {
    //si y'a exception on attrape et arrive ici
    die("Erreur de connexion :" . $e->getMessage());
}
?>