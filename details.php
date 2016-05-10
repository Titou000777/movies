<!-- TWITER -->
<script>! function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!-- G + -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'fr'}
</script>
<!-- FACEBOOK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<?php 
	// On démare la session :
    session_start();
    
 	include_once('inc/db.php');
 	include('inc/functions.php');
 	
 	if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['slug'])) {
 		$id = trim(strip_tags($_GET['id']));
 		$slug = trim(strip_tags($_GET['slug']));
 		$details = getBy('movies_full', $_GET['id'], 'id', '*');
 	}

 	if (!empty($_POST['see'])) {

 		$id = trim(strip_tags($_GET['id']));

 		if (!isset($_COOKIE['tosee'])) {
 			setcookie('tosee', $id, time() + 365*24*3600);
 		} else {
 			setcookie('tosee', $_COOKIE['tosee'].'+'.$id, time() + 365*24*3600);
 		}

 		header('Location: http://localhost/movies/movies/user/dashboard.php?cat=tosee');
 	}

$tosee = explode('+', $_COOKIE['tosee']);
$addtosee = '';
foreach ($tosee as $i) {
	$id = trim(strip_tags($_GET['id']));
	if ($i == $id) {
		$addtosee = $id;
	}
}

?>

<?php include('inc/header.php'); ?>

<?php 
	if(!empty($details)): 
		foreach ($details as $detail):
?>

<section class="wrapper">
	<section id="image-content">
		<?php getImg($detail['id'], $detail['title']); ?>
	</section>

	<section id="movie-resume">
		<h2><?= $detail['title'] ?></h2>
		<h3>Résumé</h3>
		<p><?= $detail['plot'] ?></p>

		<ul id="movie-liste">
			<li>Réalisateur : <?= $detail['directors'] ?></li>
			<li>Acteurs : <?= $detail['cast'] ?></li>
			<li>Scénario : <?= $detail['writers'] ?></li>
			<li>Année : <?= $detail['year'] ?></li>
			<li>Popularité : <?= $detail['popularity'] ?></li>
		</ul>

		<section>
			<form action="" method="POST">
			<?php if (empty($addtosee)) {
				echo '<input type="submit" name="see" value="A voir" class="position" />';
			} ?>
				<!-- <input type="submit" name="rating" value="voter" /> -->
			</form>

			<ul id="movie-partage">
<<<<<<< HEAD
				<!-- <p>Partager</p> -->
				    <li><div class="fb-share-button" data-layout="button" data-mobile-iframe="true"></div></li>
					<li><a class="twitter-share-button" href="https://twitter.com/share" target="_blank"></a></li>
					<li><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: fr_FR</script><script type="IN/Share"></script></li>
					<li><div class="g-plus" data-action="share" data-annotation="none" data-href="http://localhost/movies/movies/index.php"></div></li>
=======
				<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
>>>>>>> refs/remotes/origin/master
			</ul>
		</section>
	</section>
</section>
<?php 
		endforeach;
	else:
		echo 'Aucun film trouvé : <a href="index.php">retour a l\'acceuil</a>.';
	endif; 
?>

<div class="clearfix"></div>

<?php include('inc/footer.php'); ?>