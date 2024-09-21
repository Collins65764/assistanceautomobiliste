<?php
//nous connecter a la bd avec le fichier'config.php'
include'config.php';
if ($_POST){
    // verifier que le user a bien rempli les informations
    // on receupere les donées de l'user
    $nom=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $marque=$_POST['marque']
    

}
//on verifie que les infos entres sont toutes differenetes du vide('')
if($nom!=' ' && $email!=' ' && $phone!=' ' && $password=' ' && $marque!=' '){
 
            //on lance la requete
            //1-premiere etape: verifiez que le user n'existe pas deja dans notre Bd
            $trmt=$pdo->prepare("SELECT * FROM users  where email=? or telephone=?");
            $trmt->execute([$email,$phone]);
            $resp=$trmt->fetchAll();
            if(sizeof($resp)==0){// si la reponse est differente de 0 alorson cree
                //2- deuxieme etape: on cree le users on insert dans notre table}
                $trmt=$pdo->prepare("INSERT INTO users(Nom complet,Email,Mot de passe,telephone,Marque et modele du vehicule) values(?,?,?,?,?)");
                $trmt->execute([$nom,$email,$phone,$password,$marque]);
                $resp=$trmt->fetch();
                header('location login.php');
    }else{//sinon on affiche le numero d'erreur
        echo 'le numero de telephone ou l\'email a deja ete utilisées pour creer un compte';
    }   
}else{//sinon on affiche le message d'erreur

    echo'vos informations sont mal remplies';
}