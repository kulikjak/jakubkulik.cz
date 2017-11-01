<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function(Request $request, Response $response) {
    $response = $this->view->render($response, "markdown.phtml", ["file" => "index", "lang" => "cs"]);
    return $response;
});

$app->get('/en/', function(Request $request, Response $response) {
    $response = $this->view->render($response, "markdown.phtml", ["file" => "index", "lang" => "en"]);
    return $response;
});


$app->get('/md[/{path:.+}]', function (Request $request, Response $response, $args) {
    $path = $request->getAttribute('path');
    $response = $this->view->render($response, "markdown.phtml", ["file" => $path, "lang" => "cs"]);
    return $response;
});

$app->get('/en/md[/{path:.+}]', function (Request $request, Response $response, $args) {
    $path = $request->getAttribute('path');
    $response = $this->view->render($response, "markdown.phtml", ["file" => $path, "lang" => "en"]);
    return $response;
});


// Recirects from wrong pages
$app->get('/en', function(Request $request, Response $response) {
    return $response->withRedirect('/en/');
});
$app->get('/md/', function(Request $request, Response $response) {
    return $response->withRedirect('/md');
});
$app->get('/en/md/', function(Request $request, Response $response) {
    return $response->withRedirect('/en/md');
});
