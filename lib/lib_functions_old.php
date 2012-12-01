/*
* Builds the main navigation of the page based on the links array.

function buildNavigation(array $links = array('home' => 'home.php'), $selected = 'home', $appliedClass = 'selectedLink') {
	$temp = '<ul>';
	
	//For each index in the array build a node for the navigation
	foreach($links as $key => $value) {
		//If the index is an array itself, call this function again
		if(is_array($value)) {
			$temp .= buildNavigation($value, $selected);
		}
		else {
			//If the key and selected are the same, add the 'selected' class to the node
			if(strcasecmp($key, $selected) == 0) {
				$temp .= '<li><a href="'. buildUrl($value) .'" class="'.$appliedClass.'">'. $key .'</a></li>';
			}
			else {
				$temp .= '<li><a href="'. buildUrl($value) .'">'. $key .'</a></li>';
			}
		}
	}
	
	return $temp.'</ul>';
}
*/

//Builds a page panel based on an array of page database rows.
/*
function buildPagePanel(array $p = array(), array $aPanel = array(), $editable=false) {
	$panels = '';
	$adminPanel = '';
	
	//If the users priviledges are of admin, build the admin panel as well.
	//if(checkPriviledges() == 'admin') {
		$adminPanel = buildAdminPanel($aPanel);
	//}
	
	//If the panel is not editable then create a normal panel.
	if(!$editable) {
		//For each index in panel build a normal panel.
		foreach($p as $panel) {
			$panels .= '<div id="content-panel-'.$panel['panel_id'].'" class="contentPanel">'
							.'<div class="contentPanelHeader">'
								.'<h2>'. $panel['title'] .'</h2>'
								. $adminPanel
							.'</div>'
							.'<div class="content">'
								.'<p>'.$panel['content'].'</p>'
							.'</div>'
						.'</div>';
		}
	}
	//Otherwise build an editable panel
	else {
		$panels = buildEditablePagePanel($p);
	}
	
	return $panels;
}
*/

/*
* Function that creates a panel that can be changed.
*
function buildEditablePagePanel(array $p = array()) {
	$panels = '';
	
	//For each index in panel create an editable panel
	foreach($p as $panel) {
		$panels .= '<div id="content-panel-'.$panel['panel_id'].'" class="contentPanel">'
						.'<form action="'.buildUrl('save').'" method="post">'
							.'<div class="contentPanelHeader">'
								.'<h2><textarea id="" name="title">'. $panel['title'] .'</textarea></h2>'
							.'</div>'
							.'<div class="content">'
									.'<textarea class="edit" name="content">'.$panel['content'].'</textarea>'
									.'<div class="right editSubmit"><input type="submit" value="Save" /></div>'
							.'</div>'
						.'</form>'
					.'</div>';
	}
	
	echo buildUrl('save');
	return $panels;
}
*/
//Not sure if needed anymore
/*
function buildPanelAdder() {
	$panels = '';
	
		$panels .= '<div class="contentPanel panelAdder">'
						.'<div class="contentPanelHeader">'
							.'<h2>Add another panel</h2>'
						.'</div>'
						.'<div class="content">'
							.'<p>Add panel</p>'
						.'</div>'
					.'</div>';
	
	return $panels;
}*/

/*
* Builds a table containing the columns in cols and the data in data.
*
function buildTable(array $cols = array(), array $data = array()) {
	$table = '<table>';
	$columns = '<tr>';
	$rows = '';
	
	foreach($cols as $key => $value) {
		$columns.= '<th>'.$value.'</th>';
	}
	
	$columns.= '</tr>';
	
	foreach($data as $entity) {
		$rows.= '<tr>';
		foreach($cols as $column) {
			if(array_key_exists($column, $entity)) {
				if(isUrl($entity[$column])) {
					$rows.= '<td><img class="avatarSmall" src="'.$entity[$column].'"/>';
				}
				else {
					$rows.= '<td>'.mapValue($entity[$column]).'</td>';
				}
			}
		}
		$rows.= '</tr>';
	}
	
	$table .= $columns.$rows.'</table>';
	return $table;
}*/

/*
* Builds a table, wrapped in a form, that adds input fileds for each data field along with a column
* containing checkboxes.
*
function buildEditableTable(array $cols = array(), array $data = array()) {
	$table = '<form action="" method="get"><table>';
	$columns = '<tr><th></th>';
	$rows = '';
	
	foreach($cols as $key => $value) {
		$columns.= '<th>'.$value.'</th>';
	}
	
	$columns.= '</tr>';
	
	foreach($data as $entity) {
		$rows.= '<tr><td><input type="checkbox" /></td>';
		foreach($cols as $column) {
			if(array_key_exists($column, $entity)) {
				if(isUrl($entity[$column])) {
					$rows.= '<td><img class="avatarSmall editable" src="'.$entity[$column].'"/>';
				}
				else {
					$rows.= '<td><input type="text" value="'.mapValue($entity[$column]).'" /></td>';
				}
			}
		}
		$rows.= '</tr>';
	}
	
	$table .= $columns.$rows;
	$table .= '</table><div class="right editSubmit"><input type="submit" value="Delete" /><input type="submit" value="Update" /></div></form>';
	return $table;
}
*/
/*
* Builds a normal table that has an editable row at the bottom to add a field.
*
function buildAddableTable(array $cols = array(), array $data = array()) {
	$size = sizeof($data);
	end($data[0]);
	$firstKey = key($data[0]);
	
	foreach($cols as $column) {
		$data[$size][$column] = '<input type="text" />';
	}
	
	$inputForm='<div class="right editSubmit">
					<label for="">Add
						<input type="text" size="2" value="1" />
						rows
					</label>
					<input type="submit" value="Go" />
					<label for="">or</label>
					<input type="submit" value="Save" />
				</div>
			</form>';
	
	return '<form>'.buildTable($cols, $data).$inputForm;
}*/

/*
* Builds a table for the members page
*
function buildMembersTable(array $cols = array(''), array $data = array(''), $editable=false) {
	if(!$editable) {
		return buildTable($cols, $data);
	}
	else if($editable == 'edit') {
		return buildEditableTable($cols, $data);
	}
	else if($editable == 'add') {
		return buildAddableTable($cols, $data);
	}
	
	return '<table></table>';
}*/

/*
* Builds the admin tool bar panel that allows editing content panels.
*

function buildAdminPanel(array $buttons = array(), $editing=false) {
	$panel ='<div class="adminPanel">';
	foreach($buttons as $button) {
		if(!$editing) {
			$panel.='<a href="'.appendUrl($button['link']).'" id="'.$button['id'].'">
					<span>'.$button['icon'].'</span>
				</a>';
		}
	}
			
	return $panel.'</div>';
}*/


/*
* Builds a panel for the left panel that allows the user to login. Displays users information if the user is already logged in.
*
function buildLoginPanel($loggedIn = false) {
	$panel = '';
	
	//If no user is logged in yet display a log in panel.
	if(!$loggedIn) {
		$panel.='<div id="signInContainer" class="leftPanel">';
		
		//If there was an error when the user tried to log in, show that error.
		if(LOGIN_ERROR == 'true') {
			$panel.='<div id="loginError" class="leftPanelMessage"><p>Incorrect username or password.</p></div>';
		}
		
		//Creates the panel to login with
		$panel.='<form id="signIn" method="post" action="login">'
					.'<label for="signInEmail">Email:</label>'
					.'<input type="text" name="loginInEmail" id="signInEmail" />'
					.'<label for="signInPassword">Password:</label>'
					.'<input type="password" name="loginInPassword" id="signInPassword" />'
					.'<input type="submit" name="loginInSubmit" id="signInSubmit" value="Sign In">'
				.'</form>'
			.'</div>';
	}
	//Otherwise a user is logged in and we need to display there information
	else {
		$panel.='<div id="userControlPanel" class="leftPanel">'
					.'<div id="controlPanelButton">'
						.'<span id="usersImage">'
							.'<img src="http://localhost/ESA/public_html/images/default_avatar.jpg" />'
						.'</span>'
					.'<span id="cpButtonLabel">'
						.'<span id="usersName"><h2>Kyle</h2></span>'
						.'<div id="cpDownArrow" class="arrow-down"></div>'
					.'</span>'
				.'</div>'
			.'</div>';
	}
	
	return $panel;
}
*/