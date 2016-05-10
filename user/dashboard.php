<?php
	// On démare la session :
    session_start();

    // Inclusion des fichiers utiles :
	include_once('../inc/db.php');
	include_once('../inc/functions.php');

	// S'il n'y a pas de session on redirige l'utilisateur :
	if(empty($_SESSION['user'])){
		header('Location: login.php');
	}

?>
<?php include('../inc/header.php'); ?>

<section class="wrapper">
	<h2>Bonjour <?= $_SESSION['user']['pseudo'] ?> bienvenu dans votre espace personnel</h2>
</section>

<?php include('../inc/footer.php'); ?>