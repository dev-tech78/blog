<?php

namespace Framework\Renderer;

class TwigRenderer implements RendererInterface {


   
   private $twig;

   private $loader;
   
    public function __construct(string $path)
    {
        $this->loader = new \Twig\Loader\FilesystemLoader($path);
        $this->twig = new \Twig\Environment($this->loader, []);
    }


      /**
     * Undocumented function
     *
     * @param string $namespace
     * @param string|null $path
     * @return void
     */
    public function addPAth(string $namespace, string $path = null):void

    {
        $this->loader->addPAth($path, $namespace);
    }
 /**
      * Permet de render une vue
      * Le chemain peut être précisé avec des namespace rajoutés via addPath()
      * $this->render('@blog/view);
      * $this->rende (view)
      * @param string $view
      * @return string
      */
      public function render(string $view, array $params = []) : string
      {
        return $this->twig->render($view, $params);
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
        $this->twig->addGlobal($key .' .twig ', $value);
    }
    
}