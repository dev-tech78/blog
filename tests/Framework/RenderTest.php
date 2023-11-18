<?php

namespace Test\Framework;

use Framework\Renderer;
use PHPUnit\Framework\TestCase;

class RenderTest extends TestCase
{
 

    private $renderer;
    
    public function setUpTest()
    {
        $this->renderer = new Renderer();
    }

    public function testRenderTheRighPath()
    {
        $this->renderer->addPath('blog',  __DIR__ . '/views');
        $content = $this->renderer->render('@blog/demo');
        $this->assertEquals('salut les gens', $content);

    }
    public function testRenderTheDeFaultPath()
    {
        $this->renderer->addPath( __DIR__ . '/views');
        $content = $this->renderer->render('demo');
        $this->assertEquals('salut les gens', $content);

    }
}