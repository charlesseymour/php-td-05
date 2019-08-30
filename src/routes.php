<?php 

include("../models/Post.php");

// View for displaying or editing single blog entry

$app->map(['GET', 'POST'], '/blog/{id}', function ($request, $response, $args) {
	$nameKey = $this->csrf->getTokenNameKey();
    $valueKey = $this->csrf->getTokenValueKey();
    $name = $request->getAttribute($nameKey);
    $value = $request->getAttribute($valueKey);
	$post = Post::where('id', $args['id'])->first();
	if (!empty($post)) {
		$comments = $post->comments;
	} else {
		$comments = "";
	}
	return $this->view->render($response, 'detail.phtml', ["post" => $post, "comments" => $comments,
		"nameKey" => $nameKey, "valueKey" => $valueKey, "name" => $name, "value" => $value
	]);
});

// View for creating new blog entry

$app->map(['GET', 'POST'], '/new', function ($request, $response, $args) {
	$nameKey = $this->csrf->getTokenNameKey();
    $valueKey = $this->csrf->getTokenValueKey();
    $name = $request->getAttribute($nameKey);
    $value = $request->getAttribute($valueKey);
	return $this->view->render($response, 'new.phtml', [
		"nameKey" => $nameKey, "valueKey" => $valueKey, "name" => $name, "value" => $value
	]);
});

// View for editing blog entry

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

// View for listing most recent 3 blog entries

$app->get('/', function ($request, $response, $args) {
	$posts = Post::orderBy('date', 'desc')->take(3)->get();
	return $this->view->render($response, 'posts.phtml', ["posts" => $posts]);
});