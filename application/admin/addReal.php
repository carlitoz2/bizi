<?php
require('classes/loader.php');
$flashbag = new FlashBag;
echo '<pre>';
print_r($flashbag->fetchMessages());
echo '</pre>';


$view='tpl/addRealView.phtml';
$title = 'Ajouter un article';

//Initialisation des erreurs à false
$erreur = '';

$dossierUpload ="uploads\img_reals";

//Tableau correspondant aux valeurs à récupérer dans le formulaire (hors fichiers)
$values = [
'real_name'=>'',
'real_pres'=>''
];

$tab_erreur =
[
'real_name'=>'Le titre doit être rempli !',
'real_pres'=>'Le contenu est vide !'
];

$db = new DataBase;

    if(array_key_exists('real_name',$_POST))
    {
    
        //On valide que tous les champs ne sont pas vides sinon on référence un erreur !
        foreach($values as $champ => $value)
        {
            if(isset($_POST[$champ]) && trim($_POST[$champ])!='')
                $values[$champ] = $_POST[$champ];
            elseif(isset($tab_erreur[$champ]))   
                $erreur.= '<br>'.$tab_erreur[$champ];
            else
                $values[$champ] = NULL;
        }


        /** SI pas d'erreurs on fini la préparation des données et on save ! */
        if($erreur =='')
        {
            //Affectation de la date d'enregistrement
            $values['dateCreated']  = date('Y-m-d h:i:s');
            
            //On déplace le fichier transmis pour l'image d'entêt de l'article dans le répertoire upload/articles/ 
            if (isset($_FILES["real_photo"]) && $_FILES["real_photo"]["error"] == UPLOAD_ERR_OK) 
            {
                $tmp_name = $_FILES["real_photo"]["tmp_name"];
                $name = basename($_FILES["real_photo"]["name"]);
                if(move_uploaded_file($tmp_name,$dossierUpload.$name))
                    $values['picture'] = $name;
                else
                    $values['picture'] = NULL;
            }
            else
                $values['picture'] = NULL;

            $values['userId'] = $_SESSION['user']['id'];

            var_dump($values);
            /**2 : Prépare ma requête SQL */
            $sth = $db->prepare('INSERT INTO realisations VALUES (NULL,:real_name,:real_pres, :dateCreated, :userId,:picture)');
            // var_dump($values);
            /** 3 : executer la requête */
            $sth->execute($values);

            /** FLASHBAG
             * On ajoute un flashbag pour informé de l'ajout d'un utilisateur sur la page listUser
             * Le flashBag (notion connue avec le framework symfony) est une variable session qui accueille des messages 
             * à afficher lors de la prochaine requête (souvent automatique avec une redirection). Lors de l'affichage de la prochaine vue le flashbag sera analysé
             * puis son contenu affiché et enfin il sera vidé ! 
             * */
            $flashbag->add('Article ajouté avec succès !');

            header('Location:indexAdmin.php');
            exit();
        }
    }


include('adminLayout.phtml');

