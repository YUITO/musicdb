<?php

class Model_Category extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
			'label'     => 'カテゴリ名',
			'validation'=> array('required'),
			'form'      => array('type'=>'text'),
		),
		'created_at' => array(
			'form' => array('type' => false),
		),
		'updated_at' => array(
			'form' => array('type' => false),
		),
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
