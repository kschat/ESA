<?php

if(isset($_GET['save'])) {
	include_once(SCRIPTS_PATH . DR . 'save.php');
}

if(isset($_GET['login'])) {
	include_once(SCRIPTS_PATH . DR . 'login.php');
}

if(isset($_GET['update']) && $_GET['update'] == 'users') {
	include_once(SCRIPTS_PATH . DR . 'updateUsers.php');
}

if(isset($_GET['signupval'])) {
	include_once(SCRIPTS_PATH . DR . 'signupValidate.php');
}

if(isset($_GET['logout'])) {
	include_once(SCRIPTS_PATH . DR . 'logout.php');
}