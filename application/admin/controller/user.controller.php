<?php

include('../addUser.php');
include('../classes/loader.php');
$userP = $user->getpassword();
$userPs = $user->getpseudo();

$db = new dataBase();

$sqlVerif = 'SELECT `user_pseudo` FROM `users`';
try{
    $pseudos = $db->query($sqlVerif);
}

    catch(PDOException $e){
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    echo 'Une erreur de connexion a eu lieu :'.$e->getMessage();

}


foreach($pseudos as $pseudo){
    if($userPs === $pseudo){
        
        $message.= 'Pseudo déjà pris!;';
        $flashbag->add($message);      
    }
    else{    
        $sqlAdd = 'INSERT INTO `users`(`user_pseudo`, `user_password`, `id_user`) VALUES (:user_pseudo, :user_password, NULL)';
        
        $sql->bindParam(":user_pseudo", $userP);
        $sql->bindParam(":user_password", $userPs);
        
        $db->query($sqlAdd);

        header('../login.php');
        exit;
        }
}


