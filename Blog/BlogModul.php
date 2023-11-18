<?php
namespace App\Blog;

use Framework\Router;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface as Response;




class BlogModule
{
    public function __construct(Router $router)
    {
        $router->get('/blog', [$this, 'index'], 'blog.index' );
        $router->get('/blog/{slug:[a-z\-]+}', [$this, 'show'], 'blog.show' );
    }

    public function index(ServerRequestInterface $request) :string

    {
        return '<h1>Bienvenu sur le Blog</h1>';
    }

    public function show(ServerRequestInterface $request) :string

    {
      
        return '<h1>Bienvenu sur l\'article'.    $request->getAttribute('slug') . '</h1>';
    }
}

