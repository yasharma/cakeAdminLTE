<?php

	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect(
	    '/admin',
	    array('controller' => 'administrators', 'action' => 'login', 'admin' => true)
	);

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
