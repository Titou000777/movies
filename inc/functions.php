<?php

	/*----------------------------------------------
	----------------FONCTIONS BDD-------------------
	----------------------------------------------*/
	/**
	 *  Connexion BDD :
	 */
	function connectBDD(){
		//global $pdo;
		try{
			$pdo = new PDO ('mysql:host=localhost;dbname=movies',"root","", array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		    ));
		}
		catch (PDOException $e) {
		    echo 'Erreur de connexion : ' . $e->getMessage();
		}	 
	}

	/**
	 * Chercher infos en BDD
	 * 2.1 AVEC UN SELECT SPECIFIQUE
	 * @PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	 * @PARAM : $element=  la variable que je veux chercher
	 * @PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	 * @PARAM : le nom de la table
	 */
	function getBy($tableName, $element, $where, $selector){
		global $pdo;
		$sql="SELECT $selector FROM $tableName WHERE $where=:element";
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':element', $element, PDO::PARAM_STR);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}

	/**
	* POUR TOUT RECUPERER
	* @PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	* @PARAM : $element=  la variable que je veux chercher
	* @PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	* @PARAM : le nom de la table
	*/
	function getAll($tableName, $selector){
		global $pdo;
		$sql="SELECT $selector FROM $tableName";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}

	/**
	 * POUR RECUPERER DE MANIERE ALEATOIRE :
	 */
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

	/**
	 * Cette fonction permet d'afficher le debug d'un array :
	 * @param array
	 * @return print_r
	 **/
	function debug($verif) {
		echo '<pre style="background-color:#000; color: #ff0000; padding: 1em;">';
		print_r($verif);
		echo '</pre>';
	}

	/**
	 * Cette fonction permet de vérifier si le $verif existe en BDD :
	 * @param $verif string => Ce que l'on vérifie
	 * @param $what string => Le nom du champ ou effectuer la recherche
	 * @return bool
	 */
	function exist($verif, $what) {
		global $pdo;
		// Requete de vérification que $verif n'existe pas en BDD :
		$query = "SELECT id FROM users WHERE $what = :verif";
		$sql = $pdo->prepare($query);
		$sql->bindValue(':verif', $verif, PDO::PARAM_STR);
		$sql->execute();
		$results = $sql->fetch();
		if(!empty($results)) {
			return true;
		}
		else {
			return false;
		}
	}

	

	/**
	 * Fonction qui affiche la pagination sur la page de recherche :
	 * @param $page id int
	 * @param $nbPage id int
	 * @return string pagination
	 */
	function paginateSearch($page, $nbPage, $search) {
		$prev = $page - 1;
		$next = $page + 1;

		echo '<ul class="pagination">';
		if($search != NULL) {
			if ($prev > 0) {
				echo '<li><a href="./search.php?search='.$search.'&page='.$prev.'">❮ &nbsp;</a></li>';
			}
			if($next <= $nbPage) {
				echo '<li><a href="./search.php?search='.$search.'&page='.$next.'">&nbsp; ❯;</a></li>';
			}
		}
		echo '</ul>';
	}

	/**
	 * Fonction qui affiche la pagination numéroté :
	 * @param $page id int
	 * @param $nbPage id int
	 * @return string pagination
	 */
	function pagination($page, $nbPage) {
		echo '<ul class="pagination">';
		for($i = 1; $i <= $nbPage; $i++) {
			echo '<li><a href="./index.php?page='.$i.'">'.$i.'</a></li>';
		}
		echo '</ul>';
	}

	/**
	 * Fonction qui affiche la pagination complete :
	 * @param $page id int
	 * @param $nbPage id int
	 * @return string pagination
	 */
	function paginationAdminComplete($page, $nbPage) {
		$prev = $page - 1;
		$next = $page + 1;

		echo '<ul class="pagination">';
		echo '<li><a href="./dashboard.php?page=1">❮ &nbsp; ❮ &nbsp;</a></li>';
		if ($prev > 0) {
			echo '<li><a href="./dashboard.php?page='.$prev.'">❮ &nbsp;</a></li>';
		}

		for($i = 1; $i <= $nbPage; $i++) {
			echo '<li><a href="./dashboard.php?page='.$i.'">'.$i.'</a></li>';
		}

		if($next <= $nbPage) {
			echo '<li><a href="./dashboard.php?page='.$next.'">&nbsp; ❯;</a></li>';
		}
		echo '<li><a href="./dashboard.php?page='.$nbPage.'">&nbsp; ❯; &nbsp; ❯;</a></li>';
		echo '</ul>';
	}