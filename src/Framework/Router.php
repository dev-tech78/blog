<?php

namespace Framework;

use Framework\Router\Route;
use Mezzio\Router\FastRouteRouter;
use Psr\Http\Message\ServerRequestInterface as Request;
use Mezzio\Router\Route as ZendRoute;


/**
 * Register and match routes
 */

class Router
{
    
  
   /**
    * Undocumented variable
    *
    * @var [fasteRouter]
    */
    private $router;
    public function __construct()
    {
       $this->router = new FastRouteRouter();
    }


    /**
     * Undocumented function
     *
     * @param string $path
     * @param callable $callable
     * @param string $name
     * @return void
     */
    public function get(string $path, callable $callable, string $name)
    {
        $this->router->addRoute( new ZendRoute($path, $callable, ['GET'], $name));
    }


    /**
     * @param ServervRequestInterFace  $request
     * @return Route/null
     */
    
    public function match(Request $request): ? Route

    {
        $result = $this->router->match($request);
        if($result->isSuccess()){

            return new Route(
                $result->getMatchedRouteName(),
                $result->getMatcheMiddleware(),
                $result->getMatchedParams());

        }
        return null;
    }

    public function genratedUri(string $name, array $params):? string
    {
        return $this->router->generateUri($name,$params);
    }
}