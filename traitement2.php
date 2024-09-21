<?php
include 'config.php';
session_start();
if($_POST){
    // traitement pour la page de traitement de connexion
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    if($email !=' ' && $password !=' '){
        //1. verifie que le user existe dans notre db
            $trmt=$pdo->prepare("SELECT * FROM users where email =?");
            $trmt->execute([$email]);
            $user=$trmt->fetchAll();
            
            /**
             * 1- le user entre le mail et le mot de passe
             * 2- on verifie que le mail existe dans notre bd
             * 3- la bd nous renvoie les informations sur le user 
             * 4- on verifie que le mot de passe entrez par le user correspond au mdp que la bb m'a renvoye
             * 5- On creait une session d'utilisateur a notre user en mettant a l'interieur son id et son mom[optionel]
             * 6- on verifie le role du user pour le redigirer vers le dashbord ou la page de user
             * 
             */

         
            if(sizeof($user)==1){//donc le user existe !

                 if ($password==$user[0]['mot_pass']) {//on verifie que le mdp entre est identique a celui de la bd
                    $_SESSION['id_user']=$user[0]['id'];
                    $_SESSION['nom']=$user[0]['nom'];
                   
                        if ($user[0]['role']=='admin') {
                        //redirige vers le dashbord
                        header('Location: interface station sevice.php');
                        }else{
                            //vers la page user
                            header('Location: interface automobiliste.php');
                        }
                 }else {
                    echo 'vos informations sont incorecte';
                 }
            }else {
                echo 'pas de user avec ces informations';
            }
    }else{
        echo 'Vos informations entrees sont nulles';
    }
    
     
}else{
    echo 'error';
}
/**
 * array(3)
 * {
        [0]=>{"id":1,"nom":"ddd"},
        [1]=>{"id":1,"nom":"ddd"},
        [2]=>{"id":1,"nom":"ddd"},
 * }
 * 
 */


?>