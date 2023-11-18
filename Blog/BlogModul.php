<?php
namespace App\Blog;

use Framework\Renderer;
use Framework\Router;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as Response;




class BlogModule
{
    
    private $render;
    
    
    public function __construct(Router $router, Renderer $render)
    {
        
        $this->render = $render;
        $this->render->addPath( 'blog', __DIR__ . '/views');
        $router->get('/blog', [$this, 'index'], 'blog.index' );
        $router->get('/blog/{slug:[a-z\-0-9]+}', [$this, 'show'], 'blog.show' );
    }

    public function index(ServerRequestInterface $request) :string

    {
        return $this->render->render('@blob/index');
    }

    public function show(ServerRequestInterface $request) :string

    {
      
        return  $this->render->render('@blog/show', ['slug' => $request->getAttribute('slug')]);
    }
}

