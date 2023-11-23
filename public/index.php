<?php







require '../vendor/autoload.php';
$render = new \Framework\Renderer\TwigRenderer(dirname(__DIR__) . '/views');

//$loader = new \Twig\Loader\FilesystemLoader(dirname( __DIR__) . '/views');
//$twig = Twig_($loader,[]);

$app = new  \Framework\App([
    \App\Blog\BlogModule::class
   
]);

$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\send($response);

