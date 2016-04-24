<?php

use \Mockery as m;

/**
 * @group Template
 */
class TwigTemplaterTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function itRendersView()
    {
        $twigEnvironment = m::mock('Twig_Environment');
        $twigEnvironment->shouldReceive('render')->with('user/index.twig', ['name' => 'billy'])->andReturn('Some HTML and stuff!');

        $templater = new App\Template\TwigTemplater($twigEnvironment);
        $html = $templater->render('user/index', ['name' => 'billy']);

        $this->assertEquals('Some HTML and stuff!', $html);
    }
}