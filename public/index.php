<?php



require '../vendor/autoload.php';
$render = new \Framework\Renderer;
$render->addPath(dirname(__DIR__) . '/views');
$app = new  \Framework\App([
    \App\Blog\BlogModule::class],
    ['render' => $render
]);

$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\send($response);

