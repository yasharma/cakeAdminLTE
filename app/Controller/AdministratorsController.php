<?php
App::uses('AppController', 'Controller');
class AdministratorsController extends AppController {
	public $uses = array('Admin');

	public function admin_login() {
		$this->set('title', 'Login');
		if ($this->Auth->loggedIn()) {
		    return $this->redirect($this->Auth->redirect());
		}
		if($this->request->is('post')){
			if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash('Username or password is incorrect','error');
	        }
		}
	}

	public function admin_dashboard()
	{
		$this->set('title','Dashboard');
	}

	public function admin_logout() {
		$this->Session->setFlash('Successfully Logged Out','success');
		$this->redirect($this->Auth->logout());
	}
}