<?php
App::uses('AppController','Controller');

class PostsController extends AppController {

	public function beforeFilter()
	{
		$this->Auth->allow('index');
	}

	public function index()
	{
		$result = $this->Post->find('all');
		$this->set('result',$result);
	}
}