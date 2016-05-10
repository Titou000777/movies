<?php

	/*----------------------------------------------
	----------------FONCTIONS BDD-------------------
	----------------------------------------------*/

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
		$sql = "SELECT $selector FROM $tableName WHERE $where = :element";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':element', $element, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	/**
	* POUR TOUT RECUPERER
	* @PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	* @PARAM : $element=  la variable que je veux chercher
	* @PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	* @PARAM : le nom de la table
	*/
	function getAll($tableName, $selector, $where = null){
		global $pdo;
		if($where) {
			$sql = "SELECT $selector FROM $tableName $where";
		}
		else {
			$sql = "SELECT $selector FROM $tableName";
		}
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	/**
	 * POUR RECUPERER DE MANIERE ALEATOIRE :
	 */
	function getRandomly($tableName, $selector, $limit){
		global $pdo;
		$sql = 'SELECT * FROM '.$tableName.' ORDER BY RAND() LIMIT '.$limit;
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	/**
	* POUR TOUT RECUPERER
	* @PARAM : $selector = la ligne que je veux sélectionner en BDD (id...)
	* @PARAM : $element=  la variable que je veux chercher
	* @PARAM : $whereValue = la colonne en BDD dans laquelle je cherche $element 
	* @PARAM : le nom de la table
	*/
	function search($tableName, $selector, $limit, $search, $from, $to, $genre)
	{
		global $pdo;
		$where = 'WHERE 1 = 1';
		if(!empty($search))
		{
			$where .= ' AND title LIKE "%'.$search.'%"';
		}

		if(!empty($genre))
        {
            $where .= ' AND (genres LIKE "%'.$genre[0].'%"';
            for($i = 1; $i < count($genre); $i++)
            {
                $where .= ' OR genres LIKE "%'.$genre[$i].'%"';
            }
            $where .= ')';
        }

		if(!empty($from) && !empty($to))
		{
			$where .= ' AND year BETWEEN '.$from.' AND '.$to.'';
		}
		else if(!empty($from) && empty($to))
		{
			$where .= ' AND year >= '.$from.'';
		}
		else if(!empty($to) && empty($from))
		{
			$where .= ' AND year <= '.$to.'';
		}
	
		$sql = "SELECT $selector FROM `$tableName` $where ORDER BY RAND() LIMIT $limit";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	//2.4 POUR RECUPERER DE MANIERE ALEATOIRE AVEC DES WHERE avec les checkbox
		// il faudrait une fonction a part pour la recherche textuelle
	//function getRandomlyBy($tableName, $selector, $genre, $cast, $popularity){
	//	
	//	global $pdo;
	//	//initialisation des string du WHERE
	//	$genreString='';
	//	$castString='';
	//	$popularityString='';
	//	
	//	if(!empty($genre)){
	//		//dans le cas ou une seule checkbox de genre est cochée, j'ai un //arret avec juste l'idex
	// 		$genreString=$genre[0]
	// 	}
//
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
	 * Cette fonction permet de vérifier si l'identifiant de connexion existe en BDD :
	 * @param $verif string => Ce que l'on vérifie
	 * @return bool
	 */
	function exist_login($verif) {
		global $pdo;
		// Requete de vérification que $verif n'existe pas en BDD :
		$query = "SELECT * FROM users WHERE username = :verif OR email = :verif";
		$sql = $pdo->prepare($query);
		$sql->bindValue(':verif', $verif, PDO::PARAM_STR);
		$sql->execute();
		$results = $sql->fetch();
		return $results;
	}

	/**
	 * Cette fonction permet de l'utilisateur courent :
	 * @param $id int 
	 * @return array
	 */
	function getUser($id) {
		global $pdo;
		// Requete de vérification que $verif n'existe pas en BDD :
		$query = "SELECT * FROM users WHERE id = :id OR email = :verif";
		$sql = $pdo->prepare($query);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		$results = $sql->fetch();
		return $results;
	}

	function getImg($img, $title) {
		if(file_exists('./posters/'.$img.'.jpg')) 
		{
			 echo '<img src="http://localhost/backend/movies/posters/'.$img.'.jpg" alt="'.$title.'" class="image-size" />';
		}
		else if(file_exists('../posters/'.$img.'.jpg')) 
		{
			 echo '<img src="http://localhost/backend/movies/posters/'.$img.'.jpg" alt="'.$title.'" class="image-size" />';
		}
		else { 
			echo'<img src="http://localhost/backend/movies/posters/avatar.jpg" alt="'.$title.'" class="image-size" />';
		}
	}