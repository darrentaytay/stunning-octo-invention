<?php namespace App\Template;

use Twig_Environment;

/**
 * Twig Templater
 * 
 * Twig implementation of the Templater interface
 */
class TwigTemplater implements Templater {

	/**
	 * Instance of Twig Envinronment
	 * @var Twig_Environment
	 */
	private $twig;

	public function __construct(Twig_Environment $twig)
	{
		$this->twig = $twig;
	}

	/**
	 * Render template
	 * @param  string $view
	 * @param  array  $data
	 * @return string
	 */
	public function render($view, $data = [])
	{
		return $this->twig->render(sprintf('%s.twig', $view), $data);
	}

}