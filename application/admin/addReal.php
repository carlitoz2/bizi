<?php
require('classes/loader.php');

$flashbag = new FlashBag;

require('model.php');

if(isset($_POST['real_name']) && trim($_POST['real_name']) != '' ){
    $name= trim(htmlspecialchars($_POST['real_name']));
}
else{
    $flashbag->add('Veuillez ajouter un Nom pour votre réalisation');

}

if(isset($_POST['real_pres'])  && trim($_POST['real_pres']) != ''){
    $pres = htmlspecialchars($_POST['real_pres']);
}
else{
    $flashbag->add('Veuillez ajouter une Présentation pour votre réalisation');
}

if(!empty($_POST['real_photo_1']) && $_POST['real_photo_1'] != '' ){
    $photo1 = $_POST['real_photo_1'];
} 
else {
    $flashbag->add('Veuillez ajouter au moins UNE photo à votre réalisation');
}






if(!empty($_POST['real_photo_2']) && $_POST['real_photo_2'] != '' ){
    $photo2 = $_POST['real_photo_2'];
} 
else {
    $photo2 ='0';
}
if(!empty($_POST['real_photo_3']) && $_POST['real_photo_3'] != '' ) {
    $photo3 = $_POST['real_photo_3'];
}
else{
    $photo3 ='0';
}
$view = 'tpl/addRealView.phtml';

include('adminLayout.phtml');



if(isset($name) && isset($pres) && isset($photo1)){
    addrealisation($name,$pres,$photo1,$photo2,$photo3);
}

