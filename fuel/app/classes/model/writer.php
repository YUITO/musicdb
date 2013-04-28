<?php

class Model_Writer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username' => array(
			'data_type' => 'varchar',
			'label' => 'ユーザID',
			'validation' => array('required'),
			'form' => array('type'=>'text'),
		),
		'email' => array(
			'form' => array('type'=>'hidden'),
		),
		'password' => array(
			'data_type' => 'varchar',
			'label' => 'パスワード',
			'validation' => array('required'),
			'form' => array('type'=>'password'),
		),
		'name' => array(
			'data_type' => 'varchar',
			'label' => 'ユーザ名',
			'validation' => array('required'),
			'form' => array('type'=>'text'),
		),
		'last_login' => array(
			'form' => array('type'=>'hidden'),
		),
		'login_hash' => array(
			'form' => array('type'=>'hidden'),
		),
		'created_at' => array(
			'form' => array('type'=>false),
		),
		'updated_at' => array(
			'form' => array('type'=>false),
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
