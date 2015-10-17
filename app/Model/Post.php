<?php
App::uses('AppModel','Model');
class Post extends AppModel {
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id'
		),
		'Like' => array(
			'className' => 'Like',
			'foreignKey' => 'post_id'
		)
	);
}