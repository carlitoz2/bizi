<?php

require('lib/bdd.lib.php');
include('classes/loader.php');

$flashbag = new FlashBag;

$db= new DataBase;
$reals = [];

function getRealisations()
{
	$db= new DataBase;
	$req = $db->prepare('SELECT * FROM realisations');
	$req->execute();
	$reals = $req->fetchAll(PDO::FETCH_ASSOC);

	return $reals;
	
}


// function addRealisation($name,$pres,$photo1,$photo2,$photo3)
// {
	
// 	$db= new DataBase;
// 	$query ='INSERT INTO realisations (`idrealisations`,`real_name`,`real_pres`,`real_photo_1`,`real_photo_2`,`real_photo_3`) VALUES (NULL,:real_name, :real_pres, :real_photo_1, :real_photo_2, :real_photo_3)';
// 	$flashbag = new FlashBag;  
// 	$req = $db->prepare($query);
// 	$req->bindParam(':real_name', $name, PDO::PARAM_STR); 
// 	$req->bindParam(':real_pres',$pres, PDO::PARAM_STR);
// 	$req->bindParam(':real_photo_1', $photo1, PDO::PARAM_STR); 

// 		$resultSet->execute($name, $pres, $photo1, $photo2, $photo3);
		
// 		if ($resultSet){
// 			$flashbag->add('La réalisation a bien été ajoutée');
// 		}
// 		else{
// 			echo 'echec';
// 		}
// }
