<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public function index() {
		
	}

	/* Users listing in admin panel */
	public function admin_index() {
		$title = 'Users Listing';
		if($this->request->is('ajax')){
			$this->autoRender = false;
			$json = $this->User->getUsersList();
			echo json_encode($json);
		}
		$this->set(compact('title'));
	}

	public function login() {
		if ($this->Auth->loggedIn()) {
		    return $this->redirect($this->Auth->redirect());
		}
		if($this->request->is('post')){
			if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
	        }
		}
	}

	public function profile() {
		
	}

	public function logout() {
		$this->Session->setFlash('Successfully Logged Out', 'success');
		$this->redirect($this->Auth->logout());
	}

	public function contact_us() {
		
	}

	/*===============================================  Admin Panel Functions  ===============================================*/
	/*
	* Standard delete function for admin panel that will delete any type of data from any model
	* @data $model, $id
	*/
	public function admin_delete() {
		if($this->request->is('post')){
			$id = explode(',', $this->data['users_id']);
			$model = $this->data['model'];
			if($this->$model->delete($id)){
				$this->Session->setFlash('Users records deleted successfully', 'success');
				$this->redirect($this->referer());
			}
		}
	}

	/*
	* Independent update status function that will work with any model contain status field
	* @data $id , $model
	*/
	public function admin_update_status() {
		if($this->request->is('post')) {
			$id = explode(',', $this->data['users_id']);
			$model = $this->data['model'];
			$flipStatus = array( 1 => 0, 0 => 1 );
			foreach ($id as $value) {
				$this->$model->id = $value;
				$this->$model->saveField('status', $flipStatus[$this->$model->field('status')]);
			}
			$this->Session->setFlash('Users status has updated successfully', 'success');
			$this->redirect($this->referer());
		}
	}

}

