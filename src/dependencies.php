<?php
// DIC configuration

$container = $app->getContainer();

// Service factory for the ORM
$container['db'] = function ($c) {
	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($c['settings']['db']);
	$capsule->setAsGlobal();
	$capsule->bootEloquent();
	
	return $capsule;
};

// view renderer
$container['view'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['csrf'] = function ($c) {
    return new \Slim\Csrf\Guard;
};
