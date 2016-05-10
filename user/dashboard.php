<?php
	// On démare la session :
    session_start();

    // Inclusion des fichiers utiles :
	include_once('../inc/db.php');
	include_once('../inc/functions.php');

	// S'il n'y a pas de session on redirige l'utilisateur :
	// if(empty($_SESSION['user'])){
	// 	header('Location: login.php');
	// }

	// On vérifie sur quel page on est :
	if(isset($_GET['cat']) && $_GET['cat'] == "tosee") {
		$title = 'Films à voir';
		if(!empty($_COOKIE['tosee'])) {
			$tosee = explode('+', $_COOKIE['tosee']);
			$where = "WHERE id = $tosee[0]";
			for($i = 1; $i < count($tosee); $i++)
			{
				$where .= " OR id = $tosee[$i]";
			}
		}
		$movies = getAll('movies_full', 'id, slug, title', $where);
	}
	else if(isset($_GET['cat']) && $_GET['cat'] == "seen") {
		$title = 'Films vus';
		if(!empty($_COOKIE['seen'])) {
			$seen = explode('+', $_COOKIE['seen']);
			$where = "WHERE id = $seen[0]";
			for($i = 1; $i < count($seen); $i++)
			{
				$where .= " OR id = $seen[$i]";
			}
			$movies = getAll('movies_full', 'id, slug, title', $where);
		}
	}
	else {
		$title = "Bonjour";
	}
	
?>
<?php include('../inc/header.php'); ?>

<section class="wrapper">
	<h2><?= $title ?></h2>
	<?php 
		if(!empty($movies)): 
			foreach ($movies as $movie):
	?>
			<div class="card">
				<div class="card-content">	
					<?php getImg($movie['id'], $movie['title']); ?>
				</div>

				<div class="card-footer">
					<a href="http://localhost/backend/movies/details.php?id=<?= $movie['id'] ?>&slug=<?= $movie['slug'] ?>" class="link-title"><?= $movie['title'] ?></a>
				</div> 
			</div>
	<?php 
			endforeach;
		endif; 
	?>
	<div class="clearfix"></div>
</section>

<?php include('../inc/footer.php'); ?>