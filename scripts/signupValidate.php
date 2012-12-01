<?php

if( isset($_POST['signupFName']) && isset($_POST['signupLName']) &&
	isset($_POST['signupEmail1']) && isset($_POST['signupEmail2']) &&
	isset($_POST['signupPassword1']) && isset($_POST['signupPassword2'])) {
	include_once('../config.php');
	include_once(LIBRARY_PATH . DR . 'lib_functions.php');
	include_once(CLASSES_PATH . DR . 'DatabaseHandler.php');
	include_once(CLASSES_PATH . DR . 'template.php');
	global $config;
	$databaseInfo = $config['databases']['ESA'];
	$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
	$dbh->addUser($_POST['signupFName'], $_POST['signupLName'], $_POST['signupEmail1'], $_POST['signupPassword1']);

	header('Location: ' . appendToUrl());
	exit;
}

//printArray($_POST);

header('Location: '.appendToUrl(array('signup' => 'error')));
exit;
