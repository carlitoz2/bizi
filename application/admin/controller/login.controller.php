<?php
include('classes/loader.php');
$userP = $userL->get_password(); // Récupère le password de UserL
$userPs = $userL->get_pseudo(); // Récupère le pseudo de UserL

$db = new DataBase;

echo $userPs;

try{ // Requête pour récupérer tous les pseudos
    $sqlVerif = 'SELECT * FROM `users` WHERE user_pseudo = "'.$userPs.'"';    
    $pseudos = $db->query($sqlVerif);

    var_dump($pseudos);

}
catch(PDOException $e){
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    echo 'Une erreur de connexion a eu lieu :'.$e->getMessage();

}

