<?php 

include('inc/functions.php');

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

if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['slug'])) {

	$id = trim(strip_tags($_GET['id']));
	$slug = trim(strip_tags($_GET['slug']));

	$detail = getBy('movies_full', $_GET['id'], 'id', '*');

}

if (empty($detail)) {
	die('aucun film trouvé : <a href="index.php">retour a l\'acceuil</a>');
}

debug($detail);

include('inc/header.php'); 


?>

<section>
	<img src="posters/10002.jpg" alt="poster" class="">
</section>

<section>
	<h2><?php if (!empty($detail[0]['title'])) echo $detail[0]['title'] ?></h2>
	<h3>Résumé</h3>
	<p><?php if (!empty($detail[0]['plot'])) echo $detail[0]['plot'] ?></p>

	<ul id="">
		<li>Réalisateur : <?php if (!empty($detail[0]['directors'])) echo $detail[0]['directors'] ?></li>
		<li>Acteurs : <?php if (!empty($detail[0]['cast'])) echo $detail[0]['cast'] ?></li>
		<li>Scénario : <?php if (!empty($detail[0]['writers'])) echo $detail[0]['writers'] ?></li>
		<li>Année : <?php if (!empty($detail[0]['year'])) echo $detail[0]['year'] ?></li>
		<li>Popularité : <?php if (!empty($detail[0]['popularity'])) echo $detail[0]['popularity'] ?></li>
	</ul>

	<section>
		<input type="submit" name="see" value="A voir" />
		<input type="submit" name="rating" value="voter" />

		<ul>
			<p>Partager</p>
			<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
		</ul>
	</section>
</section>









<?php include('inc/footer.php'); ?>