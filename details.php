<?php 
 	include_once('inc/db.php');
 	include('inc/functions.php');
 	
 	if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['slug'])) {
 		$id = trim(strip_tags($_GET['id']));
 		$slug = trim(strip_tags($_GET['slug']));
 		$details = getBy('movies_full', $_GET['id'], 'id', '*');
 	}
?>

<?php include('inc/header.php'); ?>

<section>
	<img src="posters/10002.jpg" alt="poster" class="">
</section>

<?php 
	if(!empty($details)): 
		foreach ($details as $detail):
?>
<section>
	<h2><?= $detail['title'] ?>/h2>
	<h3>Résumé</h3>
	<p><?= $detail['plot'] ?></p>

	<ul id="">
		<li>Réalisateur : <?= $detail['directors'] ?></li>
		<li>Acteurs : <?= $detail['cast'] ?></li>
		<li>Scénario : <?= $detail['writers'] ?></li>
		<li>Année : <?= $detail['year'] ?></li>
		<li>Popularité : <?= $detail['popularity'] ?></li>
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
<?php 
		endforeach;
	else:
		echo 'aucun film trouvé : <a href="index.php">retour a l\'acceuil</a>';
	endif; 
?>









<?php include('inc/footer.php'); ?>