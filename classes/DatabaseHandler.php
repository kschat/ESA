<?php 

class DatabaseHandler {
	private $handle;
	
	public function __construct($database, $host, $user, $password, $errorHandling = true){
		try {
			$this->handle = new PDO("mysql:host=$host;dbname=$database;", $user, $password);
			if($errorHandling) {
				$this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public function executeQuery($query, array $parameters = array(), $fetch_type = PDO::FETCH_ASSOC) {
		$result = array();
		
		$sth = $this->handle->prepare($query);
		
		if($sth->execute($parameters)) {
			while($row = $sth->fetch($fetch_type)) {
				array_push($result, $row);
			}
		}
		
		return $result;
	}

	public function executeUpdate($query, array $parameters = array(), $fetch_type = PDO::FETCH_ASSOC) {
		$result = array();
		
		$sth = $this->handle->prepare($query);
		
		return $sth->execute($parameters);
	}
	
	public function getPagePanels($page = 'home') {
		$sql = 'SELECT panels.panel_id, panels.page, panels.title, panels.content
				FROM panels
				WHERE panels.page = ?;';
		
		return $this->executeQuery($sql, array($page));
	}
	
	public function getAdminMenu($panel = '%') {
		$sql=  'SELECT admin_buttons.admin_button_id, admin_buttons.url, admin_buttons.icon, admin_buttons.html_id
				FROM 
					((admin_buttons LEFT JOIN has_a
						ON admin_buttons.admin_button_id = has_a.admin_button_id)
					LEFT JOIN admin_panels 
						ON has_a.admin_panel_id = admin_panels.admin_panel_id)
					LEFT JOIN panels
						ON admin_panels.admin_panel_id = panels.admin_panel_id
				WHERE panels.panel_id LIKE ?;';

		return $this->executeQuery($sql, array($panel));
	}
	
	public function getUsers(array $filter = array()) {
		
		$sql = 'SELECT CONCAT(users.avatar) AS Avatar, CONCAT(users.firstname, " " ,users.lastname) AS Name, 
				CONCAT(users.alumni) AS Alumni, CONCAT(positions.position_name) AS Position, users.user_id
				FROM
					(users LEFT JOIN statuses
					ON users.user_id = statuses.user_id)
					LEFT JOIN positions
					ON statuses.position_id = positions.position_id';
		$sql .= (!empty($filter)) ? ' WHERE '.$filter[0].' ?' : '';
		$sql .= ';';
		
		return $this->executeQuery($sql, (isset($filter[1])) ? array($filter[1]) : array());
	}
	/*
	public function updateUser($id, $avatar, $fName, $lName, $alumni, $position) {
		$sql = 'UPDATE (users
					LEFT JOIN statuses
					ON users.user_id = statuses.user_id)
					LEFT JOIN positions
					ON statuses.position_id = positions.position_id 
				SET users.avatar = ?, users.firstname = ?, users.lastname = ?, 
					users.alumni = ?, positions.position_name = ?
				WHERE users.user_id = ?';

		return $this->executeQuery($sql, array($avatar, $firstname, $lastname, $alumni, $position, $id));
	}*/

	public function updateUser($user = array()) {
		$sql = 'UPDATE (users
					LEFT JOIN statuses
					ON users.user_id = statuses.user_id)
					LEFT JOIN positions
					ON statuses.position_id = positions.position_id 
				SET users.firstname = ?, users.lastname = ?, 
					users.alumni = ?, positions.position_name = ?
				WHERE users.user_id = ?';

		return $this->executeUpdate($sql, $user);
	}

	public function deleteUser($id) {
		$sql = 'DELETE FROM users 
				WHERE users.user_id = ?;';

		return $this->executeUpdate($sql, array($id));
	}

	public function addUser($fName, $lName, $email, $password) {
		$sql = "INSERT INTO users (user_id, firstname, lastname, grad_year, alumni, signedISA, password) 
				VALUES('', ?, ?, 'Spring 2012', 1, 1, ?);
				INSERT INTO statuses (status_id, user_id, position_id)
				VALUES('', '', 8);
				INSERT INTO emails (email_id, user_id, email_address, type)
				VALUES('', '', ?, 'main');";

		return $this->executeUpdate($sql, array($fName, $lName, $password, $email));
	}

	public function verifyLogin($email, $password) {
		$sql = 'SELECT users.firstname, users.lastname, users.avatar
				FROM emails, users
				WHERE emails.email_address = ? AND users.password = ? AND users.user_id = emails.user_id AND emails.type = "main"';
		
		return $this->executeQuery($sql, array($email, $password));
	}
	
	public function saveChanges($id, $title, $content) {
		$sql = 'UPDATE panels
				SET panels.content = ?, panels.title = ?
				WHERE panels.panel_id = ?;';

		return $this->executeUpdate($sql, array($content, $title, $id));
	}
	
	public function addComment($page_id = 0, $user_id = 0, $comment = '') {
		$sql = 'INSERT INTO comment(comment.comment_id, comment.user_id, comment.project_id, comment.comment_text)
				VALUES (?, ?, ?, ?);';
		
		$sth = $this->$handle->prepare($sql);
		
		return $sth->execute(array(null, $user_id, $page_id, $comment));
	}
	
	public function getTableViewLinks($page = '%', $id = '%') {
		$sql = 'SELECT table_views.label, table_views.url
				FROM table_views
				LEFT JOIN pages 
				ON table_views.page_id = pages.page_id
				WHERE table_views.table_view_id LIKE ? AND pages.name LIKE ?;';

		return $this->executeQuery($sql, array($id, $page));
	}

	//Table view testing
	public function getTableViews($filter = 'All members') {
		$sql = 'SELECT table_view_columns.column_title, column_options.column_name, column_options.table_name
				FROM 
				(table_views
					LEFT JOIN table_view_columns
					ON table_views.table_view_id = table_view_columns.table_view_id)
					LEFT JOIN column_options
					ON table_view_columns.col_opt_id = column_options.col_opt_id
				WHERE table_views.label = ?';

		return $this->executeQuery($sql, array($filter));
	}

/*
	public function getTableSelectionBox() {
		$sql = 'SELECT TABLE_NAME, COLUMN_NAME
				FROM INFORMATION_SCHEMA.COLUMNS
				WHERE TABLE_SCHEMA = 'esa' AND TABLE_NAME = 'users' OR TABLE_NAME = 'positions'
					OR TABLE_NAME = 'phone_numbers' OR TABLE_NAME = 'addresses' OR TABLE_NAME = 'emails';';
	}
*/
	public function disconnect() {
		$dbh = null;
	}
}