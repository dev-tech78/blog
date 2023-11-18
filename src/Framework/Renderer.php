<?php
 namespace Framework;

use PHPUnit\Framework\TestCase;

 class Renderer

 {
   
   private $paths = [];

   const DEFAULT_NAMESPACE = '__MAIN';
    /**
     * varibles globalements accessibles pour toutes les vues 
     *
     * @var array
     */
   private $globals = [];
   
      /**
     * Permet de rajouter un chemain pour cgarger les vues
     *
     * @param string $key
     * @param [type] $value
     * @return void
     */
    public function addPath(string $namespace, string $path = null): void
    {
      
      if(is_null($path)) {
        
        $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
      }else{
        $this->paths[$namespace] = $path;
      }
      
       
    }
     /**
      * Permet de render une vue
      * Le chemain peut être précisé avec des namespace rajoutés via addPath()
      * $this->render('@blog/view);
      * $this->rende (view)
      * @param string $view
      * @return string
      */
    public function render(string $view) : string

    {
        if($this->hasNamespace($view)){
            $path = $this->replaceNamespace($view). '.php';

        }else{
              
           $path = $this->paths[self::DEFAULT_NAMESPACE] . DIRECTORY_SEPARATOR . $view . 'php';
        }
        
      
        ob_start();
        $render = $this;
        extract($this->globals);
        extract($params);
        require ($path);
        return ob_get_clean();
        
     
    }

    /**
     * Permet de rajouter des variables blobales à toutes les vues
     *
     * @param string $key
     * @param [type] $value
     * @return void
     */
    public function addGlobal(string $key, $value):void
    {
        $this->globals[$key] =  $value;
    }

    private function  hasNamespace(string $view): bool{
        return $view[0] === '@';
    }

    private function getNamespace(string $view): string{
    return substr($view, 1, strpos($view, '/'));
    }

    private function replaceNamespace(string $view): string{
       $namespace = $this->getNamespace($view);
       return str_replace('@' . $namespace, $this->paths[$namespace], $view);
        }

      
    
 }