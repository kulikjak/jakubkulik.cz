<?php
// Routes

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response) {
    return $this->view->render($response, "index.phtml");
});

$app->get('/md[/{route:.+}]', function (Request $request, Response $response, $args) {
    // $params is an array of all the optional segments
    $route = $request->getAttribute('route');
    $response = $this->view->render($response, "markdown.phtml", ["file" => $route]);
    return $response;
});
