<?php
App::uses('AppModel','Model');
/**
* 
*/
class Comment extends AppModel
{
	
	public $hasAndBelongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'joinTable' => 'Posts_Comments',
			'foreignKey' => 'comment_id',
			'associationForeignKey' => 'post_id'
		)
	);
}