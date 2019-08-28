<?php 

include("../models/Post.php");
//use \Models\Post;
// Routes

$app->get('/blog/{id}', function ($request, $response, $args) {
	$post = Post::where('id', $args['id'])->first();
	if (!empty($post)) {
		$comments = $post->comments;
	} else {
		$comments = "";
	}
	return $this->view->render($response, 'detail.phtml', ["post" => $post, "comments" => $comments]);
});

$app->map(['GET', 'POST'], '/new', function ($request, $response, $args) {
	$nameKey = $this->csrf->getTokenNameKey();
    $valueKey = $this->csrf->getTokenValueKey();
    $name = $request->getAttribute($nameKey);
    $value = $request->getAttribute($valueKey);
	return $this->view->render($response, 'new.phtml', [
		"nameKey" => $nameKey, "valueKey" => $valueKey, "name" => $name, "value" => $value
	]);
});

$app->map(['GET', 'POST'], '/edit/{id}', function ($request, $response, $args) {
	$nameKey = $this->csrf->getTokenNameKey();
    $valueKey = $this->csrf->getTokenValueKey();
    $name = $request->getAttribute($nameKey);
    $value = $request->getAttribute($valueKey);
	$post = Post::where('id', $args['id'])->first();
	return $this->view->render($response, 'edit.phtml', [
		"nameKey" => $nameKey, "valueKey" => $valueKey, "name" => $name, "value" => $value,
		"post" => $post
	]);
});

$app->get('/', function ($request, $response, $args) {
	$posts = Post::orderBy('date', 'desc')->take(3)->get();
	return $this->view->render($response, 'posts.phtml', ["posts" => $posts]);
});