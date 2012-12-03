<div id="userControlPanel" class="leftPanel">
	<a href="<?php echo appendToUrl('controlpanel'); ?>" id="controlPanelButton" class="cp-button">
		<span id="usersImage">
			<img src="http://localhost/ESA/public_html/images/default_avatar.jpg" />
		</span>
		<span id="cpButtonLabel">
			<span id="usersName"><h2><?php echo $this->fName . ' ' . $this->lName; ?></h2></span>
			<div id="cpDownArrow" class="<?php echo $this->open? 'arrow-up' : 'arrow-down'; ?>"></div>
		</span>
	</a>

	<?php 
		if($this->open) { ?>
			<a href="<?php echo appendToUrl('logout'); ?>">Log out</a> <?php
		}
	?>
</div>