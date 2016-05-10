<?php
	// On démare la session :
    session_start();

	include_once('inc/db.php');
	include_once('inc/functions.php');

	// Si une recherche est effectuée :
	if(!empty($_GET['rechercher']) && $_GET['rechercher'] == 'ok') {
		if(!empty($_GET['search'])) {
			$search = trim(strip_tags($_GET['search']));
		}
		else {
			$search = '';
		}

		if(!empty($_GET['from'])) {
			$from = trim(strip_tags($_GET['from']));
		}
		else {
			$from = '';
		}

		if(!empty($_GET['to'])) {
			$to = trim(strip_tags($_GET['to']));
		}
		else {
			$to = '';
		}

		if(empty($_GET['genre'])) {
			$genre = '';
		}
		else {
			$genre = $_GET['genre'];
		}

		$movies = search('movies_full', 'id, slug, title', 20, $search, $from, $to, $genre);
	}
	else {
		$movies = getRandomly('movies_full', 'id, slug, title', 20);
	}

?>
<?php include('inc/header.php'); ?>

<section class="wrapper">
	
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
	<a href="./index.php" class="btn-block">Plus de films</a>
</section>

<?php include('inc/footer.php'); ?>