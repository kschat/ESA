<?php

if(isset($_POST['loginInEmail']) && isset($_POST['loginInPassword'])) {
	include_once('../config.php');
	include_once(LIBRARY_PATH . DR . 'lib_functions.php');
	include_once(CLASSES_PATH . DR . 'DatabaseHandler.php');
	include_once(CLASSES_PATH . DR . 'template.php');
	global $config;
	$databaseInfo = $config['databases']['ESA'];
	$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
	$user = $dbh->verifyLogin($_POST['loginInEmail'], $_POST['loginInPassword']);

	if(sizeof($user) == 1) {
		$_SESSION['loggedIn'] = 'true';
		$_SESSION['fName'] = $user[0]['firstname'];
		$_SESSION['lName'] = $user[0]['lastname'];
		$_SESSION['avatar'] = $user[0]['avatar'];

		header('Location: '.appendToUrl($_GET['back']));
		exit;
	}
}

$dbh->disconnect();
header('Location: '.appendToUrl(array('login' => 'error')));
exit;
