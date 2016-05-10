<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Ciné Movie</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</head>

<body>
    <header class="header">
        <a href="./index.php" class="logo left"><img src="./assets/img/logo.png" alt="CinéMovies"><span>CinéMovies</span></a>
        <form action="index.php" class="header-search left">
            <input type="search" name="search" placeholder="Rechercher un film">
            <button type="button" class="btn btn-drop"><i class="fa fa-plus"></i></button>
            <button type="submit" class="btn"><i class="fa fa-search"></i></button>
            <div class="header-form-drop content-drop hide">
                <label for="cat">
                    <input type="checkbox" name="cat" id="cat"> Catégorie du film
                </label>
                <label for="cat">
                    <input type="checkbox" name="cat" id="cat"> Catégorie du film
                </label>
            </div>
        </form>
        <nav class="header-nav">
            <ul>
                <li><a href="./user/dashboard.php?cat=tosee">Films à voir</a></li>
                <li><a href="./user/dashboard.php?cat=seen">Films vus</a></li>
            </ul>
        </nav>
        <div class="right">
            <a href="./user/sign.php#login" class="link-btn-ter">Connexion</a>
            <a href="./user/sign.php#signup" class="link-btn-bis">Inscription</a>
        </div>
        <div class="clearfix"></div>
    </header>
