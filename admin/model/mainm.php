<?php
 abstract class mainm{
	 
    public function addView($path) {
		$this->views[] = $path;
		foreach ($this->views as $view) {
			include_once $view;
		}
	}
	
	
}


?>