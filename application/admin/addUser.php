<?php


include('classes/loader.php');

//var_dump($_SESSION);
$flashbag = new Flashbag();
$flash = $flashbag->hasMessages();
if($flash == true){
    $messages = $flashbag->fetchMessages();

    foreach($messages as $message){
        echo $message;
    }
}


$user = new User($pseudo= null , $password = null);

$message = '';

if(array_key_exists('pseudo', $_POST)){
try{

        if(isset($_POST['pseudo']) && $_POST['pseudo'] != ''){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $user->set_pseudo($pseudo); 
        }
        else{
            $message = 'Veuillez choisir un pseudo';
            $flashbag->add($message);
        }

        
        if(array_key_exists('password', $_POST)){
            if (!array_key_exists('password_confirm', $_POST)){
                $message = 'Veuillez remplir le champ confirmation';
                $flashbag->add($message);   
                }
        else{
            if(array_key_exists('password_confirm', $_POST) && $_POST['password_confirm'] === $_POST['password']){
                $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user->set_password($password);
                include('controller/user.controller.php');
                exit();
            }
            else{
                $message = 'Veuillez vérifier mot de passe et confirmation';
                $flashbag->add($message);            
            }
        }
    }
        else{

        $message = 'Veuillez saisir un mot de passe';
        $flashbag->add($message);
        }
    }
    catch(Exception $e){
        echo 'Une erreur autre que co a eu lieu :'.$e->getMessage();
    }
}


$view = 'tpl/addUserView.phtml';
include('adminLayout.phtml');
?>