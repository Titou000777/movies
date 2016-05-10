<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Ciné Movie</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="http://localhost/Backend/movies/assets/css/style.css" />
	<script src="http://localhost/Backend/movies/assets/js/jquery.min.js"></script>
    <script src="http://localhost/Backend/movies/assets/js/app.js"></script>
</head>

<body>
    <header class="header">
        <a href="http://localhost/Backend/movies/index.php" class="logo left"><img src="http://localhost/Backend/movies/assets/img/logo.png" alt="CinéMovies"><span>CinéMovies</span></a>
        <form action="index.php" method="GET"class="header-search left">
            <input type="search" name="search" placeholder="Rechercher un film">
            <div class="header-form-drop content-drop hide">
                <legend>Par année :</legend>
                <label for="from">De</label>
                <select name="from" id="from">
                    <option value="">Selectionnez</option>
                    <option value="1950">1950</option>
                    <option value="1960">1960</option>
                    <option value="1970">1970</option>
                    <option value="1980">1980</option>
                    <option value="1990">1990</option>
                    <option value="2000">2000</option>
                    <option value="2010">2010</option>
                </select>
                <label for="to">à</label>
                <select name="to" id="to">
                    <option value="">Selectionnez</option>
                    <option value="1960">1960</option>
                    <option value="1970">1970</option>
                    <option value="1980">1980</option>
                    <option value="1990">1990</option>
                    <option value="2000">2000</option>
                    <option value="2010">2010</option>
                    <option value="2016">2016</option>
                </select>
                 <legend>Par catégorie :</legend>
                <label for="selectionner">
                    <input type="checkbox" name="selectionner" id="selectionner"> <span style="color: #F15C22;">Tout sélectionner</span>
                </label> <br />
                <label for="fantasy">
                    <input type="checkbox" name="genre[]" value="Fantasy" id="fantasy"> Fantasy
                </label> 
                <label for="romance">
                    <input type="checkbox" name="genre[]" value="Romance" id="romance"> Romance
                </label> 
                <label for="action">
                    <input type="checkbox" name="genre[]" value="Action" id="action"> Action
                </label> <br />
                <label for="thriller">
                    <input type="checkbox" name="genre[]" value="Thriller" id="thriller"> Thriller
                </label> 
                <label for="aventure">
                    <input type="checkbox" name="genre[]" value="Aventure" id="aventure"> Aventure
                </label> 
                <label for="animation">
                    <input type="checkbox" name="genre[]" value="Animation" id="animation"> Animation
                </label> <br />
                <label for="comedie">
                    <input type="checkbox" name="genre[]" value="Comedie" id="comedie"> Comedie
                </label> 
                <label for="family">
                    <input type="checkbox" name="genre[]" value="Family" id="family"> Family
                </label> 
                <label for="sciencefiction">
                    <input type="checkbox" name="genre[]" value="Science Fiction" id="sciencefiction"> Science Fiction
                </label> <br />
                <label for="crime">
                    <input type="checkbox" name="genre[]" value="Crime" id="crime"> Crime
                </label> 
                <label for="horror">
                    <input type="checkbox" name="genre[]" value="Horror" id="horror"> Horror
                </label> 
                <label for="mistere">
                    <input type="checkbox" name="genre[]" value="Mistere" id="mistere"> Mistere
                </label> <br />
                <label for="guerre">
                    <input type="checkbox" name="genre[]" value="Guerre" id="guerre"> Guerre
                </label> 
                <label for="biographie">
                    <input type="checkbox" name="genre[]" value="Biographie" id="biographie"> Biographie
                </label> 
                <label for="musique">
                    <input type="checkbox" name="genre[]" value="Musique" id="musique"> Musique
                </label>
            </div>
            <button type="button" class="btn btn-drop"><i class="fa fa-plus"></i></button>
            <button type="submit" name="rechercher" value="ok" class="btn"><i class="fa fa-search"></i></button>
        </form>
        <nav class="header-nav">
            <ul>
                <li><a href="http://localhost/Backend/movies/user/dashbord.php?cat=tosee">Films à voir</a></li>
                <li><a href="http://localhost/Backend/movies/user/dashbord.php?cat=seen">Films vus</a></li>
            </ul>
        </nav>
        <div class="right">
            <?php if(!empty($_SESSION['user'])) : ?>
                <a href="http://localhost/Backend/movies/user/logout.php" class="link-btn-bis">Déconnexion</a>
            <?php else: ?>
                <a href="http://localhost/Backend/movies/user/login.php" class="link-btn-ter">Connexion</a>
                <a href="http://localhost/Backend/movies/user/sign.php" class="link-btn-bis">Inscription</a>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </header>
