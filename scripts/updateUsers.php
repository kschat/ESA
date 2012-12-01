<?php
include_once('../config.php');
include_once(LIBRARY_PATH . DR . 'lib_functions.php');
include_once(CLASSES_PATH . DR . 'DatabaseHandler.php');
include_once(CLASSES_PATH . DR . 'template.php');

global $config;
$databaseInfo = $config['databases']['ESA'];
$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);

if(isset($_POST['delete']) && $_POST['delete'] == 'Delete') {
	if(isset($_POST['delete_checkbox'])) {
		foreach($_POST['delete_checkbox'] as $key => $value) {
			$dbh->deleteUser($value);
			//echo 'a';
		}
	}
}
else if(isset($_POST['update']) && $_POST['update'] == 'Update') {
	//Filter out the post indexes that we don't need and order the array in a more acceptable manner.
	foreach($_POST['Name'] as $id => $value) {
		$names = explode(' ', $value);

		$users[$id] = array(
				'Firstname' => $names[0], 
				'Lastname' => $names[1], 
				'Alumni' => $_POST['Alumni'][$id], 
				'Position' => $_POST['Position'][$id]
		);
	}

	foreach($users as $id => $user) {
		$dbh->updateUser(array($user['Firstname'], $user['Lastname'], $user['Alumni'], $user['Position'], $id));
	}
}
$dbh->disconnect();
//printArray($users);

header('Location: ' . appendToUrl($_GET['back']));
exit;