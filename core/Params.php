<?php
class Paramsd {
	private $vars = array ();
	function __set($name, $data) {
		$this->vars [$name] = $data;
	}
	function __get($name) {
		if (isset ( $this->vars [$name] )) {
			return $this->vars [$name];
		}
	}
}

class stdObject{

}
?>