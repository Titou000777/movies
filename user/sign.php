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
	$errors = array();
	$success = false;

	// Si le formulaire est posté :
	if(!empty($_POST['submit']))
	{
		// On sécurise les variables :
		$pseudo = trim(strip_tags($_POST['pseudo']));
		$email = trim(strip_tags($_POST['email']));
		$password = trim(strip_tags($_POST['password']));
		$passwordTwo = trim(strip_tags($_POST['passwordtwo']));

		// Vérification des erreurs :
		if(!empty($pseudo)) {
			if(strlen($pseudo) <= 2) {
				$errors['pseudo'] = 'Pseudo trop court';
			}
			elseif(strlen($pseudo) >= 50) {
				$errors['pseudo'] = 'Pseudo trop long';
			}
			elseif(exist($pseudo, 'username')) {
				$errors['pseudo'] = 'Ce pseudo est déjà pris';
			}
		}
		else {
			$errors['pseudo'] = 'Renseignez un pseudo';
		}

		// Vérification des erreurs :
		if(!empty($email)) {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'Cet email n\'est pas valide';
			}
			elseif(exist($email, 'email')) {
				$errors['email'] = 'Cet email est déjà pris';
			}
		}
		else {
			$errors['email'] = 'Renseignez un email';
		}

		// Vérification des erreurs :
		if(!empty($password)) {
			if(strlen($password) < 6) {
				$errors['password'] = 'Mot de passe trop court';
			}
			elseif(empty($passwordTwo) || $password != $passwordTwo) {
				$errors['passwordtwo'] = 'Les mots de passe sont différents';
			}
		}
		else {
			$errors['password'] = 'Renseignez un mot de passe';
		}

		// S'il n'y à pas d'érreur alors on enregistre en base de donnée :
		if(count($errors) == 0)
		{
			// Définition des variables :
			$role = 'USER';
			$token = hash("sha256", sha1(uniqid(time())));

			// Hashage du mot de passe :
			$pass = password_hash($password.$token, PASSWORD_DEFAULT);

			// Ajout en Base de donnée :
			$query = "INSERT INTO users (username, email, password, token, role, created) VALUES (:username, :email, :password, :token, :role, NOW())";
			$sql = $pdo->prepare($query);
			$sql->bindValue(':username', $pseudo, PDO::PARAM_STR);
			$sql->bindValue(':email', $email, PDO::PARAM_STR);
			$sql->bindValue(':password', $pass, PDO::PARAM_STR);
			$sql->bindValue(':token', $token, PDO::PARAM_STR);
			$sql->bindValue(':role', $role);
			$sql->execute();
	
			$lastInsertId = $pdo->lastInsertId();

			if($lastInsertId != NULL) {
				$success = true;
				// On vide les variables :
				$pseudo = '';
				$email = '';
				$password = '';
				$passwordTwo = '';
				$token = '';
				$role = '';
			}
		}
	}
?>
<?php include('../inc/header.php'); ?>
      
      <section class="wrapper">
	      <div class="well">
	      	<h1>Inscription</h1>
	      	<?php if($success) { echo '<div class="alert alert-success">Inscription réussi ! ;)</div>'; } ?>
	      	<form action="sign.php" method="POST">
	      		<?php if(!empty($errors['pseudo'])) { echo '<div class="alert alert-danger">'.$errors['pseudo'].'</div>'; } ?>
				<div class="form-group">
				  <label for="pseudo">Pseudo</label>
				  <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" value="<?php if(!empty($pseudo)) { echo $pseudo; } ?>">
				</div>
				<?php if(!empty($errors['email'])) { echo '<div class="alert alert-danger">'.$errors['email'].'</div>'; } ?>
				<div class="form-group">
				  <label for="email">Email</label>
				  <input type="email" name="email" class="form-control" id="email" placeholder="Email"  value="<?php if(!empty($email)) { echo $email; } ?>">
				</div>
				<?php if(!empty($errors['password'])) { echo '<div class="alert alert-danger">'.$errors['password'].'</div>'; } ?>
				<div class="form-group">
				  <label for="password">Mot de passe</label>
				  <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
				</div>
				<?php if(!empty($errors['passwordtwo'])) { echo '<div class="alert alert-danger">'.$errors['passwordtwo'].'</div>'; } ?>
				<div class="form-group">
				  <label for="password">Répétez le mot de passe</label>
				  <input type="password" name="passwordtwo" class="form-control" id="password" placeholder="Répétez le mot de passe">
				</div>
				<input type="submit" class="btn btn-default" name="submit" value="Inscription"/>
			</form>
	      </div>
      </section>

<?php include('../inc/footer.php'); ?>