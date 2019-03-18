<?php

include('lib/bdd.lib.php');
include('classes/loader.php');

$session = new Session;

$session->start();


$key ="connect";
$child = "true";

$session->read($key,$child);





//$vue='login'; pas de vue, voir en bas de fichier
$title = 'Se connecter';

//Initialisation des erreurs à false
if (isset($_SESSION['connect']) && $_SESSION['connect'] === true){
    header('Location:addReal.php');
    exit();
}
    
if(array_key_exists('pseudo', $_POST)){
    $userL = new User($pseudo= null , $password = null);

    if(isset($_POST['pseudo']) && $_POST['pseudo'] != '') 
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $userL->set_pseudo($pseudo); 

        if(isset($_POST['password']) && $_POST['password'] != '') 
        {
            $password = htmlspecialchars($_POST['password']);
            $userL->set_password($password); 
            include 'controller/login.controller.php';
        }
        else{
            $message = 'Veuillez entrer votre Mot de passe';
            $flashbag->add($message);
        } 
    }
    else{
        $message = 'Veuillez entrer votre pseudo';
        $flashbag->add($message);
    }
   
}




/*Le layout du login est différent du layout du reste de l'admin : la vue login inclut tout le HTML !! */
include('tpl/loginView.phtml');


