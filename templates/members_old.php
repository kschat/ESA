/*

	//echo buildMembersTable($cols, $result, EDIT_REQUEST);
<div class="contentPanel">
	<div class="contentPanelHeader">
			<h2>Members</h2>
		
		<?php echo buildAdminPanel($config['adminPanel'], EDIT_REQUEST); ?>
	</div>
		
	<div class="content">
			<?php
				$result = $dbh->getUsers((isset($filter[REQUESTED_FILTER])? $filter[REQUESTED_FILTER] : array()));
				
				if(is_array($result) && !empty($result)) {
					
					foreach($result[0] as $key => $value) {
						$cols[] = ucfirst($key);
					}
					
					echo buildMembersTable($cols, $result, EDIT_REQUEST);
				}
				else {
					echo '<p>No users were found.</p>';
				}
				
				/*
				echo '<pre>';
				print_r($filter[REQUESTED_FILTER]);
				echo '</pre>';
				*
				
				$dbh->disconnect();
			?>
	</div>
</div>*/