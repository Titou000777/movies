<?php
    // On démare la session :
    session_start();

    // On autorise que les membre déconnecté :
    if(!empty($_SESSION['user'])) {
		header('Location: dashboard.php');
	}

	// Inclusion des fichiers utiles :
	include_once('../inc/db.php');
	include_once('../inc/functions.php');

	// Déclaration des variables :
	$errors ='';

	// Si le formulaire est posté :
	if(!empty($_POST['submit']))
	{
		// On sécurise les variables :
		$pseudo = trim(strip_tags($_POST['pseudo']));
		$password = trim(strip_tags($_POST['password']));

		// Vérification des erreurs :
		if(empty($pseudo)) {
			$errors = 'Renseignez un pseudo';
		}
		else {
			// On vérifie que le pseudo existe bien :
			$identifiant = exist_login($pseudo);
			if(!empty($identifiant)) {
				$pass = $identifiant['password'];
				$token = $identifiant['token'];
				$ip = $_SERVER["REMOTE_ADDR"];

				// On vérifie que le mot de passe est correct :
				if(password_verify($password.$token, $pass)) {
					// On connecte le membre :
					$user = ['id' => $identifiant['id'], 'pseudo' => $identifiant['username'], 'email' => $identifiant['email'], 'ip' => $ip];
					$_SESSION['user'] = $user;

					// Si la case se souvenir de moi est coché  :
					if(!empty($_POST['remember_me'])) {
						setcookie('auth', $identifiant['id'].'-_'.sha1($token.$ip), time() + 3600 * 24, '/', 'localhost', false, true);
					}

					header('Location: dashboard.php');
				}
				else {
					$errors = 'Mauvais identifiants';
				}
			}
			else {
				$errors = 'Mauvais identifiants';
			}
		}
	}
?>
<?php include('../inc/header.php'); ?>
      
      <section class="wrapper">
	      <div class="well">
	      	<h1>Connexion</h1>
	      	<?php if(!empty($errors)) { echo '<div class="alert alert-danger">'.$errors.'</div>'; } ?>
	      	<form action="login.php" method="POST">
				<div class="form-group">
				  <label for="email">Pseudo ou Email</label>
				  <input type="text" name="pseudo" class="form-control" id="email" placeholder="Pseudo ou Email">
				</div>
				<div class="form-group">
				  <label for="password">Mot de passe</label>
				  <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
				</div>
				<div class="checkbox">
				  <label>
				    <input type="checkbox" name="remember_me"> Se souvenir de moi
				  </label>
				</div>
				<input type="submit" class="btn btn-default" value="Connexion" name="submit"/>
			</form>
			<a href="reset.php"><em>Mot de passe oublié?</em></a>
	      </div>
      </section>

<?php include('../inc/footer.php'); ?>