<ul>
	<?php 
		foreach($this->nodes as $node) {
			$node->render();
		}
	?>
</ul>