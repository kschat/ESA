<form>
	<table>
		<tr>
			<?php echo $this->columns->render(); ?>
		</tr>
	
		<?php echo $this->rows->render(); ?>
		<?php echo $this->addRow->render(); ?>
		<!--<input type="text" />-->
	</table>
	<div class="right editSubmit">
		<label for="">Add
			<input type="text" size="2" value="1" />
			rows
		</label>
		<input type="submit" value="Go" />
		<label for="">or</label>
		<input type="submit" value="Save" />
	</div>
</form>