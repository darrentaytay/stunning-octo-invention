<?php namespace App\Template;

interface Templater {
	
	public function render($view, $data);

}