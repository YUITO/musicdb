<?php

class Model_Song extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'category_id',
		'title',
		'body',
		'writer_id',
		'URL',
		'comment',
		'created_at',
		'updated_at',
	);
	protected static $_belongs_to = array(
		'category' => array(
			'key_from' => 'category_id',
			'model_to' => 'Model_Category',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'writer' => array(
			'key_from' => 'category_id',
			'model_to' => 'Model_Writer',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,		
		)
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
}
