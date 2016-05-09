<?php
	include_once('inc/db.php');
	include_once('inc/functions.php');

	$movies = getRandomly('movies_full', 'id, slug, title', 20);

?>
<?php include ('inc/header.php'); ?>

<section class="wrapper">
	<form method="POST" action="">
		<label for="choix">Choisir</label>
		<select name="selection">
			<option value="area">Catégorie</option>
			<option value="year">Année</option>
			<option value="famous">Popularité</option>
		</select>
	</form>	
	
	<?php 
		if(!empty($movies)): 
			foreach ($movies as $movie):
	?>
			<div class="card">
				<div class="card-content">	
					<?php getImg($movie['id'], $movie['title']); ?>
				</div>
				<div class="card-footer">
					<a href="./details.php?id=<?= $movie['id'] ?>&slug=<?= $movie['slug'] ?>" class="link-title"><?= $movie['title'] ?></a>
				</div>
			</div>
	<?php 
			endforeach;
		endif; 
	?>
			<div class="clearfix"></div>
	<a href="#" class="btn-block">Plus de film</a>
</section>

<?php include ('inc/footer.php'); ?>