<?php
class AdministratorsControllerTest extends ControllerTestCase {
	public $fixtures = array('app.admin');

	public function testAdminLogin() {
		$result = $this->testAction('/admin/administrators/login', 
			array(
				'data' => array(
					'Admin' => array(
						'username' => 'admin',
						'password' => '123456'
					),
					'method' => 'post'
				)
			)
		);
        debug($result);
	}
}