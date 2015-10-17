<?php
App::uses('Admin', 'Model');
class AdminTest extends CakeTestCase {
    public $fixtures = array('app.admin');
    public $autoFixtures = false;

    public function setUp() {
        parent::setUp();
        $this->Admin = ClassRegistry::init('Admin');
    }

    
    public function testcheckBlowFishHash() {
    	$password = '123456';
    	$result = $this->Admin->checkBlowFishHash($password);
    	$expected = true;
    	$this->assertEquals($expected, $result);
    }
}