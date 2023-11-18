<?php

namespace Test\Framework;

use Framework\Router;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * Undocumented variable
     *
     * @var [Router]
     */
    private $router;
    
    
    public function seUp()
    {
        $this->router = new Router();
    }

    public function testGetMethode()
    {
        $request = new Request( 'GET', '/blog');
        $this->router->get('/blog', function() {
            return 'hello';
        }, 'blog');
      
        $route =  $this->router->match($request);
        $this->assertEquals('blog', $route->getName());
        $this->assertEquals('hello', call_user_func_array( $route->getCallback(), [$request]));
    }


    public function testGetMethodeIfUrlDoesNotExist()
    {
        $request = new Request( 'GET', '/blog');
        $this->router->get('/blogze', function() {
            return 'hello';
        }, 'blog');
      
        $route =  $this->router->match($request);
        $this->assertEquals(null, $route);
      
    }

    public function testGetMethodeWhith¨Parameters()
    {
        $request = new Request( 'GET', '/blog/mon-slug-8');
        $this->router->get('/blog', function() { return 'hello';}, 'posts');
        $this->router->get('/blog/{slug:[a-z0-9\-]+}-{id:\d+}', function() { return 'hello';}, 'post.show');
      
        $route =  $this->router->match($request);
        $this->assertEquals('post.show', $route->getName());
        $this->assertEquals('hello', call_user_func_array( $route->getCallback(), [$request]));
        $this->assertEquals(['slug' =>'mon-slug', 'id' => '8'], $route->getParameters);
    }
}