<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new STGC\Application( [
	'debug'     => true,
	'root_path' => __DIR__ . '/../src/'
] );

$app->run();
