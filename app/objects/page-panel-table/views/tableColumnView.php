<?php foreach($this->args as $key => $value) { 
	if($value != 'User_id') { ?>
		<th><?php echo $value; ?></th><?php
	}
}