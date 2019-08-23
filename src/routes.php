<?php 

require_once('connection.php');
// Routes

$app->get('/', function ($request, $response, $args) {
	return $this->view->render($response, 'posts.phtml', $args);
});