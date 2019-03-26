<?php
include('classes/loader.php');
$userP = $userL->get_password(); // Récupère le password de UserL
$userPs = $userL->get_pseudo(); // Récupère le pseudo de UserL

$db = new DataBase;
$flashbag = new Flashbag();

//echo $userPs;

try{ // Requête pour récupérer tous les pseudos
    $sqlVerif = 'SELECT * FROM `users` WHERE user_pseudo = "'.$userPs.'"';    
    $pseudos = $db->query($sqlVerif);

    var_dump($pseudos);
    if (empty($pseudos)){
        $message = 'Ce pseudo n\'existe pas';
        $flashbag->add($message); 
    }
    else{
        if (password_verify($_POST['password'],$verif['aut_password'])){
            echo 'connexion reussie!';
           $_SESSION['connect'] = true; // on crée un index 'connect pour déterminer si l'utilisateur est connecté
            $_SESSION['user'] = ['id'=>$pseudo['0']['id_user'],'pseudo'=>$pseudo['0']['user_pseudo']]; // on cherche a récupérer les identifiants propres de l'auteur. A savoir, son id, et son nom.
        }
    }
}
catch(PDOException $e){
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    echo 'Une erreur de connexion a eu lieu :'.$e->getMessage();

}

