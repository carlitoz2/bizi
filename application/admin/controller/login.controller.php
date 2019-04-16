<?php
include('classes/loader.php');
$userP = $userL->get_password(); // Récupère le password de User tentant de se co
$userPs = $userL->get_pseudo(); // Récupère le pseudo de User tentant de se co

$messages=$flashbag->fetchMessages();
if($messages) print_r($messages);

$db = new DataBase;
$session = new Session;
//$session->dump();

if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }




try{ // Requête pour récupérer tous les pseudos
    $sqlVerif = 'SELECT * FROM `users` WHERE user_pseudo = "'.$userPs.'"';    
    $pseudos = $db->query($sqlVerif);
    var_dump($pseudos);
    if(empty($pseudos) || $pseudos == false){
        $flashbag->add('Mauvais pseudo');
    }
    else{
        $userBusy = new User($pseudo= null , $password = null);

        $userBusy->set_password($pseudos[0]['user_password']);
        $userBusy->set_pseudo($pseudos[0]['user_pseudo']);
   
        if (password_verify($userP, $userBusy->get_password()))
        {
           $session->write('connect',true);
           $session->write('user', ['id'=>$pseudos[0]['id_user'],$userBusy->_pseudo]);
          header('location: indexAdmin.php');
        }
        else{
            $flashbag->add('Pas le bon mot de passe');
            unset($_SESSION['user']);
        }


    }
    
}
catch(PDOException $e){
    //Si une exception est envoyée par PDO (exemple : serveur de BDD innaccessible) on arrive ici
    echo 'Une erreur de connexion a eu lieu :'.$e->getMessage();

}

