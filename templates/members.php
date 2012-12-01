<?php
include_once('../config.php');
global $config;
$databaseInfo = $config['databases']['ESA'];
$filter = $config['filters'];

$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
$users = $dbh->getUsers((isset($filter[REQUESTED_FILTER])? $filter[REQUESTED_FILTER] : array()));

//If there's an edit request, add an empty column to the $cols array; 
//otherwise set $cols to an empty array
$cols = EDIT_REQUEST == 'edit' ? array(0 => '') : array();

$userAdd = array();

if(!empty($users)) {
	foreach($users[0] as $key => $value) {
		$cols[] = ucfirst($key);
	}
}
else {
	$users = '<p>No users were found.</p>';
}


$page = array();
$panelFile = 'panelView.php';
$tableFile = 'tableView.php';
$rowFile = 'tableRowView.php';

if(EDIT_REQUEST == 'add') {
	$tableFile = 'addableTableView.php';
	$rowFile = 'tableRowView.php';

	foreach ($cols as $value) {
		if($value != 'Avatar' && $value != 'User_id') {
			$userAdd[$value] = '<input type="text" placeholder="'.$value.'" name="'.$value.'-add" />';
		}
		else {
			$userAdd[$value] = '';
		}
	}
}

if(EDIT_REQUEST == 'edit') {
	$tableFile = 'editableTableView.php';
	$rowFile = 'editableTableRowView.php';
}

foreach($dbh->getPagePanels(REQUESTED_PAGE) as $panel) {
	$cached_id = $panel['panel_id'];
	
	$page[$cached_id] = new Template($panelFile, array(
		'title' => $panel['title'], 
		'content' => new Template($tableFile, array(
				'columns' => new Template('tableColumnView.php', $cols),
				'rows' => new Template($rowFile, $users),
				'addRow' => new Template('addableTableRowView.php', $userAdd)
			)), 
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

	//Table view testing.
	//echo tableViewQuery('all_members_view', $dbh->getTableViews());
}