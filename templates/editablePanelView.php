<div id="content-panel-<?php echo $this->id; ?>" class="contentPanel">
	<form action="<?php echo appendToUrl(array('save', $this->id)); ?>" method="post">
		<div class="contentPanelHeader">
			<h2 class="full-width">
				<textarea id="" name="title"><?php echo $this->title; ?></textarea>
			</h2>
		</div>
		<div class="content">
			<textarea class="edit" name="content"><?php echo $this->content; ?></textarea>
			<div class="right editSubmit">
				<input type="submit" value="Save" />
			</div>
		</div>
	</form>
</div>