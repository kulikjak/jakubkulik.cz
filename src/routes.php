<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->get('/', function(Request $request, Response $response) {
    $response = $this->view->render($response, "markdown.phtml", ["file" => "index", "lang" => "cs"]);
    return $response;
});

$app->get('/en', function(Request $request, Response $response) {
    $response = $this->view->render($response, "markdown.phtml", ["file" => "index", "lang" => "en"]);
    return $response;
});


$app->get('/md[/{route:.+}]', function (Request $request, Response $response, $args) {
    $route = $request->getAttribute('route');
    $response = $this->view->render($response, "markdown.phtml", ["file" => $route, "lang" => "cs"]);
    return $response;
});

$app->get('/en/md[/{route:.+}]', function (Request $request, Response $response, $args) {
    $route = $request->getAttribute('route');
    $response = $this->view->render($response, "markdown.phtml", ["file" => $route, "lang" => "en"]);
    return $response;
});
