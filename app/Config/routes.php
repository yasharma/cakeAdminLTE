<?php
	Router::connect(
	    '/admin',
	    array('controller' => 'administrators', 'action' => 'login', 'admin' => true)
	);
	// Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
