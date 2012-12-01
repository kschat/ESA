<?php
include_once('../config.php');
include_once(LIBRARY_PATH . DR . 'lib_functions.php');
include_once(CLASSES_PATH . DR . 'DatabaseHandler.php');
include_once(CLASSES_PATH . DR . 'template.php');

global $config;
$databaseInfo = $config['databases']['ESA'];
$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
//$host = $_SERVER['HTTP_HOST'];

$dbh->saveChanges($_GET['save'], $_POST['title'], $_POST['content']);
$dbh->disconnect();

header('Location: ' . appendToUrl(REQUESTED_PAGE));
exit;