<?php foreach ($this->args as $entity) { 
	$userID = $entity['user_id'];
	?>
	<tr>
		<td>
			<input type="checkbox" name="delete_checkbox[]" value="<?php echo $entity['user_id'];?>"/>
		</td>
	<?php foreach ($entity as $column => $value) { ?>
		<td>
			<?php if($column == 'Avatar') { echo formatImage($value); } 
			else if($column != 'user_id') { ?><input type="text" name="<?php echo $column . '['.$userID.']'; ?>" value="<?php echo mapValue($value); ?>" /><?php } ?>
		</td><?php
	}
	?></tr><?php
}