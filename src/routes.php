<?php 

include("../models/Post.php");

// require_once('connection.php');
// Routes

$app->get('/', function ($request, $response, $args) {
	$post = Post::find(1);
	return $this->view->render($response, 'posts.phtml', ["post" => $post]);
});