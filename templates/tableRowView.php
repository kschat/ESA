<?php foreach($this->args as $entity) { ?>
	<tr> 
	<?php foreach ($entity as $column => $value) { 
		if($column == 'Avatar') { ?> <td> <?php echo formatImage($value); }
		else if($column != 'user_id') { ?><td><?php echo mapValue($value); ?></td><?php }
	}
	?></tr><?php
}