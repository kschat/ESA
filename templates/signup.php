<?php
include_once('../config.php');
global $config;
$databaseInfo = $config['databases']['ESA'];
$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
$page = array();
$panelFile = 'panelView.php';

if(EDIT_REQUEST) $panelFile = 'editablePanelView.php';

foreach($dbh->getPagePanels(REQUESTED_PAGE) as $panel) {
	$cached_id = $panel['panel_id'];
	
	$page[$cached_id] = new Template($panelFile, array(
		'title' => $panel['title'], 
		'content' => $panel['content'], 
		'id' => $cached_id,
		'adminMenu' => new Template('adminMenuView.php', array('buttons' => array())
		))
	);
	
	foreach($dbh->getAdminMenu($cached_id) as $button) {
		$page[$cached_id]->adminMenu->buttons = new Template('adminButtonView.php', array(
			'id' => $button['html_id'],
			'url' => $button['url'],
			'icon' => $button['icon'])
		);
	}
	
	$page[$panel['panel_id']]->render();
}

//echo '<pre>';
//print_r($adminMenu);
//echo '</pre>';