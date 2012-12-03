<?php

class Template {
	private $args;
	private $file;
	
	public function __construct($file, $args = array()) {
		$this->file = $file;
		$this->args = $args;
	}
	
	public function render() {
		include TEMPLATES_PATH.'/'.$this->file;
	}
	
	public function __get($name) {
		return $this->args[$name];
	}
	
	public function __set($name, $value) {
		if(is_array($this->args[$name])) {
			$this->args[$name][] = $value;
		}
		else {
			$this->args[$name] = $value;
		}
	}
}