<?php
    // On démare la session :
    session_start();

    // On autorise que les membre déconnecté :
    if(!empty($_SESSION['user'])) {
		header('Location: index.php');
	}

	// Inclusion des fichiers utiles :
	include_once('../inc/db.php');
	include_once('../inc/functions.php');

	// Déclaration des variables :
	$errors ='';
	$success = false;

	// Si le formulaire est posté :
	if(!empty($_POST['submit']))
	{
		// On sécurise les variables :
		$pseudo = trim(strip_tags($_POST['pseudo']));

		// Vérification des erreurs :
		if(empty($pseudo)) {
			$errors = 'Renseignez un pseudo';
		}
		else {
			// On vérifie que le pseudo existe bien :
			$identifiant = exist_login($pseudo);
			if(!empty($identifiant)) {
				$email = urlencode($identifiant['email']);
				$token = urlencode($identifiant['token']);
				$link = "<a href=\"http://localhost/Backend/movies/generate.php?email=$email&token=$token\">Regénérez votre mot de passe</a>";

				$success = true;
				
			}
			else {
				$errors = 'Mauvais identifiants';
			}
		}
	}
?>
<?php include_once('../inc/header.php'); ?>
      
      <section class="wrapper">
	      <div class="well">
	      	<h1>Mot de passe oublié?</h1>
	      	<?php if($success && isset($link)): ?>
	      		<?= $link; ?>
	      	<?php else: ?>
		      	<?php if(!empty($errors)) { echo '<div class="alert alert-danger">'.$errors.'</div>'; } ?>
		      	<form action="reset.php" method="POST">
					<div class="form-group">
					  <label for="email">Pseudo ou Email</label>
					  <input type="text" name="pseudo" class="form-control" id="email" placeholder="Pseudo ou Email">
					</div>
					<input type="submit" class="btn btn-default" value="Demander" name="submit"/>
				</form>
			<?php endif; ?>
	      </div>
      </section>

<?php include_once('../inc/footer.php'); ?>