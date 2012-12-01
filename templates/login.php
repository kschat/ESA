<?php

if(isset($_POST['loginInEmail']) && isset($_POST['loginInPassword'])) {
	include_once('../config.php');
	include_once(LIBRARY_PATH . DR . 'lib_functions.php');
	include_once(CLASSES_PATH . DR . 'DatabaseHandler.php');
	include_once(CLASSES_PATH . DR . 'template.php');
	global $config;
	$databaseInfo = $config['databases']['ESA'];
	$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
	$host = $_SERVER['HTTP_HOST'];
	
	if(sizeof($dbh->verifyLogin($_POST['loginInEmail'], $_POST['loginInPassword'])) == 1) {
		$_SESSION['loggedIn'] = 'true';
		header('Location: '.appendToUrl());
		exit;
	}
}

header('Location: '.appendToUrl(array('login' => 'error')));
exit;
