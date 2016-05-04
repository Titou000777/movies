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
	
	<div class="card">
		<div class="card-content">	
			<img src="posters/10002.jpg" alt="posters" class="" />
		</div>
		<div class="card-footer">
			<a href="./details.php" class="link-title">Titre du film</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<a href="#" class="btn-block">Plus de film</a>
</section>

<?php include ('inc/footer.php'); ?>