<?php
	
    // On démare la session :
    session_start();
    
	if(!empty($_SESSION['user'])) {
		$_SESSION = [];
		session_destroy();
		setcookie('auth', '', time() - 3600 * 24, '/', 'localhost', false, true);
	}
	header('Location: ../index.php');