<?php 

include("../models/Post.php");

// require_once('connection.php');
// Routes

$app->get('/blog/{id}', function ($request, $response, $args) {
	$post = Post::where('id', $args['id'])->first();
	$comments = $post->comments;
	return $this->view->render($response, 'detail.phtml', ["post" => $post, "comments" => $comments]);
});

$app->get('/', function ($request, $response, $args) {
	$posts = Post::take(3)->get();
	return $this->view->render($response, 'posts.phtml', ["posts" => $posts]);
});