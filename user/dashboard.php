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
	$page = false;

	// On vérifie sur quel page on est :
	if(isset($_GET['cat']) && $_GET['cat'] == "tosee") {
		$title = 'Films à voir';
		$page = true;
	}
	else if(isset($_GET['cat']) && $_GET['cat'] == "seen") {
		$title = 'Films vus';
		$page = true;
	}
	else {
		$title = "Bonjour";
	}

	// Si l'on est pas sur la page d'accueil on vérifie les cookie :
	if(!empty($_COOKIE['tosee'])) {
		debug($_COOKIE['tosee']);
	}

?>
<?php include('../inc/header.php'); ?>

<section class="wrapper">
	<h2><?= $title ?></h2>
</section>

<?php include('../inc/footer.php'); ?>