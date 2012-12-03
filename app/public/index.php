<?php
	session_start();
	//session_destroy();
	include_once('../config/config.php');
	include_once(UTILS_PATH . DS . 'lib_functions.php');
	include_once(UTILS_PATH . DS . 'DatabaseHandler.php');
	include_once(STRUCTURES_PATH . DS . 'template.php');
	$databaseInfo = $config['databases']['ESA'];
	$dbh = new DatabaseHandler($databaseInfo['database'], $databaseInfo['host'], $databaseInfo['username'], $databaseInfo['password']);
	//include_once(SCRIPTS_PATH . '/redirect.php');

	//TODO: convert to template
	include_once(LAYOUTS_PATH . DS . 'header.php');
	include_once(OBJECTS_PATH . DS . 'admin-section' . DS . 'views' . DS . 'adminSectionView.php');
?>
		<div id="mainContentContainer" class="contentContainer">	
			<?php
				include_once(OBJECTS_PATH . DS . 'left-panel' . DS . 'views' . DS . '/leftPanel.php'); //TODO: convert to template 
			?>
			<!--<div class="center-toolbar">
				<p>a</p>
			</div>-->
			<div class="main-center">
				<div class="main-center-container">
					<noscript>
						<div id="javascript-warning" class="contentPanel errorPanel">
							<div class="content">
								<h2>It is detected that Javascript is disabled. It's recommened that you enable it to access this site.</h2>
							</div>
						</div>
					</noscript>

					<script>
						//document.getElementById('javascript-warning').style.display = '';
					</script>
					<?php 
						echo getPage(REQUESTED_PAGE); 
						//echo '<br />'.REQUESTED_PAGE.'<br />'. $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'<br />'.$_SERVER['QUERY_STRING']. '<br />';
						//echo appendToUrl();
						//printArray($_POST);
					?>
				</div>
			</div>


			<?php
				//TODO: convert to template
				//include_once(TEMPLATES_PATH . '/footer.php');
			?>
		</div>
	</body>
</html>
