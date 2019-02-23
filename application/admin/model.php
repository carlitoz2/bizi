<?php

require('lib/bdd.lib.php');



$reals = [];

function getRealisations()
{

	try {
		$dbh = new PDO(DB_DSN,DB_USER,DB_PASS);
			//On dit à PDO de nous envoyer une exception s'il n'arrive pas à se connecter ou s'il rencontre une erreur
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch (PDOException $e) {
		echo 'Échec lors de la connexion : ' . $e->getMessage();
		}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$req = $dbh->prepare('SELECT * FROM realisations');
	$req->execute();
	$reals = $req->fetchAll(PDO::FETCH_ASSOC);

	return $reals;
	
}
function addRealisation()
{
	try {
		$dbh = new PDO(DB_DSN,DB_USER,DB_PASS);
			//On dit à PDO de nous envoyer une exception s'il n'arrive pas à se connecter ou s'il rencontre une erreur
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch (PDOException $e) {
		echo 'Échec lors de la connexion : ' . $e->getMessage();
		}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$query ='INSERT INTO realisations (`real_name`,`real_pres`,`real_photos`) VALUES ( ?, ?, ?)';
        $resultSet = $dbh->prepare($query);
		$resultSet->execute([$_POST['real_name'], $_POST['real_pres'], $_POST['real_photos']]);
		
		if ($resultSet){
			echo 'on est bon';
		}
		else{
			echo 'echec';
		}
}
