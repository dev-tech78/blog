<?php


namespace Framework\Renderer;

interface RendererInterface

{
    

    /**
     * Undocumented function
     *
     * @param string $namespace
     * @param string|null $path
     * @return void
     */
    public function addPAth(string $namespace, string $path = null):void;


 /**
      * Permet de render une vue
      * Le chemain peut être précisé avec des namespace rajoutés via addPath()
      * $this->render('@blog/view);
      * $this->rende (view)
      * @param string $view
      * @return string
      */
      public function render(string $view) : string;

     /**
     * Permet de rajouter des variables blobales à toutes les vues
     *
     * @param string $key
     * @param [type] $value
     * @return void
     */
    public function addGlobal(string $key, $value):void;



   
}