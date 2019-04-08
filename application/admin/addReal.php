<?php
require('classes/loader.php');
echo'<pre>';
print_r($_FILES);
echo'</pre>';
$flashbag = new FlashBag;
$flashbag->fetchMessages();

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



$extensionsOk = ['jpeg','jpg','png']; 

$fileType = $_FILES['myfile']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));

if (! in_array($fileExtension,$fileExtensions)) {
    $flashbag->add('Ce type de fichier n\'est pas autorisé, il faut un jpeg,jpg ou png');
}

if ($fileSize > 15000000) {
    $flashbag->add("Le fichier fait plus de 15MB, c'est trop; Le fichier doit faire moins.");
}


// ( [real_photos] => 
// Array ( [name] => Array ( [0] => code.PNG [1] => code.PNG [2] => code.PNG ) 
// [type] => Array ( [0] => image/png [1] => image/png [2] => image/png )
//  [tmp_name] => Array ( [0] => C:\xampp\tmp\php546E.tmp [1] => C:\xampp\tmp\php546F.tmp [2] => C:\xampp\tmp\php5470.tmp )
//  [error] => Array ( [0] => 0 [1] => 0 [2] => 0 )
//  [size] => Array ( [0] => 57386 [1] => 57386 [2] => 57386 ) ) )



// if(array_key_exists('real_name',$_POST))
// {


//     /** SI pas d'erreurs on fini la préparation des données et on save ! */
//     if(empty($flashbag))
//     { 
        
//         //On déplace le fichier transmis pour l'image d'entêt de l'article dans le répertoire upload/articles/ 
//         if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == UPLOAD_ERR_OK) 
//         {
//             $tmp_name = $_FILES["picture"]["tmp_name"];
//             $name = basename(time().'_'.$_FILES["picture"]["name"]);
//             if(move_uploaded_file($tmp_name, REP_BLOG.REP_UPLOAD.'articles/'.$name))
//                 //$values['picture'] = $name;
//             else
//                 $values['picture'] = NULL;
//         }
//         else{
//             $values['picture'] = NULL;
//         }

//     }
// }    
$view = 'tpl/addRealView.phtml';

include('adminLayout.phtml');



if(isset($name) && isset($pres) && isset($photo1)){
    addrealisation($name,$pres,$photo1,$photo2,$photo3);
}

