<header class="header">
	<a href="./index.php" class="logo left"><img src="../assets/img/logo.png" alt="CinéMovies"><span>CinéMovies</span></a>
	<form action="index.php" class="header-search left">
		<input type="search" name="search" placeholder="Rechercher un film">
		<button type="button" class="btn btn-drop"><i class="fa fa-plus"></i></button>
		<button type="submit" class="btn"><i class="fa fa-search"></i></button>
		<div class="header-form-drop content-drop hide">
			<label for="cat">
				<input type="checkbox" name="cat" id="cat"> Catégorie du film
			</label>
		</div>
	</form>
	<div class="right">
		<a href="./user/sign.php#login">Connexion</a>
		<a href="./user/sign.php#signup">Inscription</a>
	</div>
	<div class="clearfix"></div>
</header>

<style>
/*********************************
*     SOMMAIRE             *
* INIT               *
* RESET              *
* HEADER             *
* NAV                *
* CONTENT              *
* FOOTER             *
* BTN                *
* PANEL              *
* FORM               *
* UTILS              *
*********************************/
/*********************************
*     $INIT                      *
* bleu ciel : #83D2E5            *
* orange: #F15C22                *
* marine: #002D56                *
* text: #424242                  *
* blanc: #fff                    *
*********************************/
/*********************************
*               $RESET           *
*********************************/
html {
  font-family: sans-serif; /* 1 */
  -ms-text-size-adjust: 100%; /* 2 */
  -webkit-text-size-adjust: 100%; /* 2 */
}

body {
  margin: 0;
}

article,
aside,
details, /* 1 */
figcaption,
figure,
footer,
header,
main, /* 2 */
menu,
nav,
section,
summary { /* 1 */
  display: block;
}

audio,
canvas,
progress,
video {
  display: inline-block;
}

audio:not([controls]) {
  display: none;
  height: 0;
}

progress {
  vertical-align: baseline;
}

template, /* 1 */
[hidden] {
  display: none;
}

a {
  background-color: transparent; /* 1 */
  -webkit-text-decoration-skip: objects; /* 2 */
}

a:active,
a:hover {
  outline-width: 0;
}


abbr[title] {
  border-bottom: none; /* 1 */
  text-decoration: underline; /* 2 */
  text-decoration: underline dotted; /* 2 */
}

b,
strong {
  font-weight: inherit;
}

b,
strong {
  font-weight: bolder;
}

dfn {
  font-style: italic;
}

h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

mark {
  background-color: #ff0;
  color: #000;
}

small {
  font-size: 80%;
}

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

img {
  border-style: none;
}


svg:not(:root) {
  overflow: hidden;
}

code,
kbd,
pre,
samp {
  font-family: monospace, monospace; /* 1 */
  font-size: 1em; /* 2 */
}

figure {
  margin: 1em 40px;
}

hr {
  box-sizing: content-box; /* 1 */
  height: 0; /* 1 */
  overflow: visible; /* 2 */
}


button,
input,
select,
textarea {
  font: inherit; /* 1 */
  margin: 0; /* 2 */
}

optgroup {
  font-weight: bold;
}

button,
input { /* 1 */
  overflow: visible;
}

button,
select { /* 1 */
  text-transform: none;
}

button,
html [type="button"], /* 1 */
[type="reset"],
[type="submit"] {
  -webkit-appearance: button; /* 2 */
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: none;
  padding: 0;
}

button:-moz-focusring,
[type="button"]:-moz-focusring,
[type="reset"]:-moz-focusring,
[type="submit"]:-moz-focusring {
  outline: 1px dotted ButtonText;
}

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}

legend {
  box-sizing: border-box; /* 1 */
  color: inherit; /* 2 */
  display: table; /* 1 */
  max-width: 100%; /* 1 */
  padding: 0; /* 3 */
  white-space: normal; /* 1 */
}

textarea {
  overflow: auto;
}

[type="checkbox"],
[type="radio"] {
  box-sizing: border-box; /* 1 */
  padding: 0; /* 2 */
}

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

[type="search"] {
  -webkit-appearance: textfield; /* 1 */
  outline-offset: -2px; /* 2 */
}

[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-input-placeholder {
  color: inherit;
  opacity: 0.54;
}

::-webkit-file-upload-button {
  -webkit-appearance: button; /* 1 */
  font: inherit; /* 2 */
}

.clearfix::before, .clearfix::after {
  content: " ";
  display: table;
}

.clearfix::after {
  clear: both;
}

/*********************************
*     $HEADER                    *
*********************************/
.header {
    background-color: #fff;
    width: 100%
    height: 70px;
    line-height: 70px;
    border-bottom: solid 2px #002D56;
    margin: 0;
    padding: 0 1em;
}

.logo {
	height: 70px;
	width: 300px;
	text-decoration: none;
}

.logo > span {
	color: #83D2E5;
	font-size: 2em;
	padding-left: .5em;
	margin: 0;
}

.logo > img {
	height: 70px;
	width: 70px;
	float: left;
}

.header-search {
	line-height: 1.2em;
	padding-top: 1em;
	width: 50%;
}

.header-search > input {
	padding: .5em;
	width: 80%;
	float: left;
}

.header-form-drop {
	top: 70px;
	width: 40%;
}

.content-drop {
	background-color: #fff;
	position: absolute;
	padding: 1em;
	-moz-box-shadow: 0px 5px 10px 0px #656565;
	-webkit-box-shadow: 0px 5px 10px 0px #656565;
	-o-box-shadow: 0px 5px 10px 0px #656565;
	box-shadow: 0px 5px 10px 0px #656565;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=180, Strength=10);
}
/*********************************
*       $NAV                     *
*********************************/

/*********************************
*     $CONTENT                   *
*********************************/

/*********************************
*     $FOOTER                    *
*********************************/

/*********************************
*       $BTN                     *
*********************************/

/*********************************
*     $PANEL                     *
*********************************/

/*********************************
*      $FORM                     *
*********************************/

/*********************************
*       $UTILS                   *
*********************************/
.left {
	float: left;
}

.right {
	float: right;
}

.hide {
	display: none;
}
</style>