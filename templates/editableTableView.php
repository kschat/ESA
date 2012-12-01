<form action="<?php echo appendToUrl(array('update' => 'users', 'back' => REQUESTED_PAGE)); ?>" method="post">
	<table>
		<tr>
			<?php echo $this->columns->render(); ?>
		</tr>
		<?php echo $this->rows->render(); ?>
	</table>

	<div class="right editSubmit">
			<input type="submit" name="delete" value="Delete" />
			<input type="submit" name="update" value="Update" />
	</div>
</form>