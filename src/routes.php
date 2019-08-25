<?php 

include("../models/Post.php");

// require_once('connection.php');
// Routes

$app->get('/', function ($request, $response, $args) {
	$posts = Post::take(3)->get();
	return $this->view->render($response, 'posts.phtml', ["posts" => $posts]);
});