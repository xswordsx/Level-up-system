<?php
require 'lib/Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->add(new \Slim\Middleware\ContentTypes());
$app->contentType('application/json');

$app->get(
    '/post',
    function () {
	   $data=array();
       $data['name']='pesho';
	   echo json_encode($data);
	   
    }
);

$app->run();

?>