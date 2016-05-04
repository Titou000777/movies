<?php

//----------------------------------------------
//---------FONCTIONS BDD------------------------
//----------------------------------------------


// 1- Connexion BDD
//---------------------------------------------

function connectBDD(){

	global $pdo;
	
	try{
		$pdo=new PDO ('mysql:host=localhost;dbname=movies',"root","", array(
			 PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	         ));
		}
	catch (PDOException $e) {
	        echo 'Erreur de connexion : ' . $e->getMessage();
	    }	 
};

// 2- Chercher infos en BDD
//---------------------------------------------

	//2.1 AVEC UN SELECT SPECIFIQUE
	//@PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	//@PARAM : $element=  la variable que je veux chercher
	//@PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	//@PARAM : le nom de la table
	function getBy($tableName, $element, $where, $selector){
		global $pdo;
		$sql="SELECT $selector FROM $tableName WHERE $where=:element";
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':element', $element, PDO::PARAM_STR);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}

	//2.2 POUR TOUT RECUPERER
	//@PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	//@PARAM : $element=  la variable que je veux chercher
	//@PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	//@PARAM : le nom de la table
	function getAll($tableName, $selector){
		global $pdo;
		$sql="SELECT $selector FROM $tableName";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}


	//2.3 POUR RECUPERER DE MANIERE ALEATOIRE
	function getRandomly($tableName, $selector, $limit){
		global $pdo;
		$sql="SELECT $selector FROM $tableName ORDER BY RAND() LIMIT $limit";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}

	//2.4 POUR RECUPERER DE MANIERE ALEATOIRE AVEC DES WHERE avec les checkbox
		// il faudrait une fonction a part pour la recherche textuelle
	// function getRandomlyBy($tableName, $selector, $genre, $cast, $popularity){
		
	// 	global $pdo;
	// 	//initialisation des string du WHERE
	// 	$genreString='';
	// 	$castString='';
	// 	$popularityString='';
		
	// 	if(!empty($genre)){
	// 		//dans le cas ou une seule checkbox de genre est cochée, j'ai un arret avec juste l'idex
	// 		$genreString=$genre[0]
	// 	}

	// 	$sql="SELECT $selector FROM $tableName WHERE ";
	// 	$stmt=$pdo->prepare($sql);
	// 	$stmt->execute();
	// 	$result=$stmt->fetchAll();
	// 	return $result;
	// }
?>