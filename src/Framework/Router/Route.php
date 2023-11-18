<?php
 

 namespace  Framework\Router;

use PhpParser\Node\Expr\FuncCall;


/**
 * Represent a match route
 */
class Route 
{
    
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $name;
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $callback;
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $parameters;
    
    public function __construct(string $name, callable $callback,  array $parameters)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }
    
    /**
     * @return string
     */
    public function getname(): string
     {
        return $this->name;
     }
     /**
      * @return  callable
      */
     
     public function getCallback(): callable
     {
        return $this->callback;
     }
     /**
      * Retrieve the URL parameters
      *@return   string []
      */
     
     public function getParameters() : array

     {
        return $this->parameters;
     }
}