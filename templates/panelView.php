<!--Start of panel-->
<div id="content-panel-<?php echo $this->id; ?>" class="contentPanel">
	<div class="contentPanelHeader">
		<h2> <?php echo $this->title; ?></h2>
			<?php echo $this->adminMenu->render(); ?>
	</div>
	<div class="content">
		<?php
			if(method_exists($this->content, 'render')) {
				echo $this->content->render();
			}
			else { ?>
				<p>
					<?php echo $this->content; ?>
				</p><?php
			} 
		 ?>
	</div>
</div>