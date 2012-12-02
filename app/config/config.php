<?php

$config = array(
	'databases'	=> array(
		'ESA'	=> array(
			'database'	=> 'esa',
			'username'	=> 'ESA',
			'password'	=> 'esapassword',
			'host'		=> 'localhost'
		)
	),
	'urls'	=> array(
		'baseURL' => $_SERVER['SERVER_NAME']
	),
	'paths' => array(
		'baseDir' => '/'
	),
	'sidePanel' => array(
		'members' => array(
			'All members'		=> 'members/all members/',
			'Officers' 			=> 'members/officers/',
			'Current members'	=> 'members/current members/'
		),
		'home'	=> array(
			
		),
		'groups' => array(
			
		)
	),
	'adminPanel' => array(
		'edit' => 	array(
			'link' 	=> '/edit',
			'id'	=> 'admin-edit-button',
			'icon'	=> '<img src="http://'.$_SERVER['HTTP_HOST'].'/images/edit.png" />'
		),
		'add' =>	array(
			'link' 	=> '/add',
			'id'	=> 'admin-add-button',
			'icon'	=> '+'
		)
	),
	'topNav' => array(
		'Home' => 'home/', 
		'Members' => 'members/',
		'Groups' => 'groups/'
	),
	'filters' => array(
		'all members'		=> array(),
		'officers'			=>	array(
			'statuses.position_id <>', '8'
		),
		'current members'	=>	array(
			'users.alumni =', 0
		)
	),
	'mapping' => array(
		0				=> 'no',
		1 				=>	'yes',
		'position_name' => 'Position'
	)
);

ini_set('error_reporting', 'true');
error_reporting(E_ALL|E_STRCT);

defined('DR')
	or define('DR', DIRECTORY_SEPARATOR);

defined('TEMPLATES_PATH')
	or define('TEMPLATES_PATH', realpath(dirname(__FILE__) . '/templates'));
	
defined('LIBRARY_PATH')
	or define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/lib'));
	
defined('CLASSES_PATH')
	or define('CLASSES_PATH', realpath(dirname(__FILE__) . '/classes'));

defined('SCRIPTS_PATH')
	or define('SCRIPTS_PATH', realpath(dirname(__FILE__) . '/scripts'));

defined('REQUESTED_PAGE')
	or define('REQUESTED_PAGE', isset($_GET['page']) ? $_GET['page'] : 'home');
	
defined('REQUESTED_FILTER')
	or define('REQUESTED_FILTER', isset($_GET['filter']) ? $_GET['filter'] : 'all members');

defined('REQUESTED_REDIRECT')
	or define('REQUESTED_REDIRECT', isset($_SESSION['redirect']) ? $_SESSION['redirect'] : false);

defined('EDIT_REQUEST')
	or define('EDIT_REQUEST', isset($_GET['edit']) ? $_GET['edit'] : false);

defined('DOC_ROOT')
	or define('DOC_ROOT', '/');

defined('LOGIN_ERROR')
	or define('LOGIN_ERROR', isset($_GET['loginError']) ? $_GET['loginError'] : false);
