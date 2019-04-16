<?php
require('classes/loader.php');
echo'<pre>';
print_r($_FILES);
echo'</pre>';
$flashbag = new FlashBag;

echo '<pre>';
print_r($flashbag->fetchMessages());
echo '</pre>';

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






$extensionsOk = ['.jpeg','.jpg','.png','.JPG','.JPEG','.PNG']; 



if(!empty($_FILES)){


    $maxSize = 50000000; // taille max des fichiers
    
    $sentFiles = $_FILES['real_photo']['tmp_name']; // nom des fichiers envoyés; utilisation des noms temporaires. 
    $dossierImage = 'uploads/img_reals/';
    $file = basename($_FILES['real_photo']['name']);
    $file_temp = $_FILES['real_photo']['tmp_name'];

    $extension = strrchr($_FILES['real_photo']['name'], '.'); // on cherche l'extension de chaque fichier
    $size = filesize($_FILES['real_photo']['tmp_name']); // récupère le poids des fichiers envoyés.

        if(!in_array($extension, $extensionsOk)) //Si l'extension n'est pas dans le tableau
        {
            $flashbag->add('Vous devez uploader un fichier de type JPEG ou JPG ou PNG pour le fichier '.$i .'.');
           
        }
        if($size>$maxSize)
			{
                $flashbag->add('Le fichier est trop gros...');
			}
            if(empty($flashbag)) //S'il n'y a pas d'erreur, on upload
			{
				 //On formate le nom du fichier ici...
				 $file= strtr($file, 
					  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
					  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                 $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
     
				 if(move_uploaded_file($file_temp, $dossierImage . $file)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				 {
                    $flashbag->add('Upload effectué avec succès !');
				
				 }
				 else //Sinon (la fonction renvoie FALSE).
				 {
                    $flashbag->add('Echec de l\'upload !');
					 
                 }

			}
    

    // $fileType = $_FILES['name']['type'];
    // $fileExtension = strtolower(end(explode('.',$fileName)));
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
    addrealisation($name,$pres,$photo1);
}

