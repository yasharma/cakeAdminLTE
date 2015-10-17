<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $components = array('Auth','DebugKit.Toolbar','Session');

	public function beforeFilter() {
		if($this->request->prefix == 'admin') {
			$this->layout = 'admin';
			AuthComponent::$sessionKey = 'Auth.Admin';
			$this->Auth->loginAction = array('controller'=>'administrators','action'=>'login');
			$this->Auth->loginRedirect = array('controller'=>'administrators','action'=>'dashboard');
			$this->Auth->logoutRedirect = array('controller'=>'administrators','action'=>'login');
			$this->Auth->authenticate = array(
				'all' => array(
					'scope' => array(
						'Admin.status' => 1
					)
				),
				'Form' => array(
				   'userModel' => 'Admin',
				   'passwordHasher' => 'Blowfish'
				)
			);
			$this->Auth->allow('login');
		} else {
			/* do another stuff for user authentication */
		}
	}

	public function isAuthorized($user){
		return true;
	}
}
