<div id="main-left">
	<div id="main-left-container">
		<?php 
			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
				$userControlPanel = new Template('userControlPanelView.php', array(
										'fName' => $_SESSION['fName'],
										'lName' => $_SESSION['lName'],
										'avatar' => $_SESSION['avatar'],
										'open' => isset($_GET['controlpanel'])
									));
				$userControlPanel->render();
			}
			else {
				$loginView = new Template('loginView.php', 'login', array('loginError' => LOGIN_ERROR));
				$loginView->render();
			}
		?>
		
		<div id="leftNavContainer">
			<?php
				//Template object used to build the UI for the side navigation
				$sideNavigation = new Template('navigationView.php', 'navigation', array('nodes' => array()));
				//Loop over each index and create a navigation node
				foreach($dbh->getTableViewLinks(REQUESTED_PAGE) as $node) {
					//Determines if the requested filter and key are the same
					if(strcasecmp(REQUESTED_FILTER, $node['url']) == 0) {
						//If they are then make that node "selected"
						$sideNavigation->nodes = 
							new Template('navigationNodeView.php', 'navigation', array(
								'url' => array(REQUESTED_PAGE, $node['url']), 'label' => $node['label'], 'linkClass' => 'selectedLeftLink')
						);
					}
					//Otherwise build a normal node
					else {
						$sideNavigation->nodes = 
							new Template('navigationNodeView.php', 'navigation', array(
								'url' => array(REQUESTED_PAGE, $node['url']), 'label' => $node['label'], 'linkClass' => '')
						);
					}
				}
				
				$sideNavigation->render();
			?>
		</div>
	</div>
</div>