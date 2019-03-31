<?php

include('classes/loader.php'); //Chargement des classes
$userP = $user->get_password(); // Récupère le password de User
$userPs = $user->get_pseudo(); // Récupère le pseudo de User


$flashbag->fetchmessages();

$db = new dataBase(); // Initialise la DB


try{ // Requête pour récupérer tous les pseudos
    $sqlVerif = 'SELECT `user_pseudo` FROM `users`';
    $pseudos = $db->query($sqlVerif);
}
catch(PDOException $e){
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    echo 'Une erreur de connexion a eu lieu :'.$e->getMessage();

}

foreach($pseudos as $pseudo =>$value){ // Pour chaque pseudo
    if($userPs == $value['user_pseudo']){ // Si le pseudo du User est déja dans la DB

        $message = 'Pseudo déjà pris!';
        $flashbag->add($message);  

       header('Location:addUser.php'); // Retour à l'ajout Utilisateur
       exit(); // Fermeture
    }
}
   
try{ // Requête  pour ajouter un utilisateur

    $sqlAdd = 'INSERT INTO users( id_user, user_pseudo, user_password) VALUES ( NULL, :user_pseudo, :user_password )'; // Requête
            
            
        $req = $db->prepare($sqlAdd);  // méthode de l'objet DB

        if(isset($req) && $req !== FALSE){ //Binding des paramètres
            $req->bindParam(':user_pseudo', $userPs, PDO::PARAM_STR); 
            $req->bindParam(':user_password',$userP, PDO::PARAM_STR);
            /* */
            $req->execute();

            header('Location:login.php'); // Envoi à la page login
            exit(); // Fermeture
        }
        
        else{ echo 'Ajout impossible';} 
    }

catch(Exception $e){
        echo 'Une erreur autre que co a eu lieu :'.$e->getMessage();
}
        
        



