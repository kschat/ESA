<?php
include_once('../config.php');
include_once(LIBRARY_PATH . '/lib_functions.php');
include_once(CLASSES_PATH . '/DatabaseHandler.php');
include_once(CLASSES_PATH . '/template.php');

global $config;
$databaseInfo = $config['databases']['ESA'];
$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);

session_destroy();

header('Location: ' . appendToUrl());