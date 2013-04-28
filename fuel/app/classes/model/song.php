<?php

class Model_Song extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'category_id' => array(
			'data_type' => 'int',
			'label'     => 'カテゴリ',
			'validation'=> array('required'),
			'form'      => array('type' => 'select'),
		),
		'title' => array(
			'data_type' => 'text',
			'label'     => '曲名',
			'validation'=> array('required'),
			'form'      => array('type' => 'text'),
		),
		'body' => array(
			'data_type' => 'text',
			'label'     => '歌詞',
			'form'      => array('type'=>'textarea'),
		),
		'writer_id' => array(
			'data_type' => 'int',
			'label'     => '作曲者',
			'validation'=> array('required','valid_string' => array(array('numeric'))),
			'form'      => array('type' => 'hidden'),
		),
		'URL' => array(
			'data_type' => 'varchar',
			'label'     => 'URL',
			'validation'=> array('required'),
			'form'      => array('type' => 'text'),
		),
		'comment' => array(
			'data_type' => 'varchar',
			'label'     => 'コメント',
			'form'      => array('type' => 'text'),
		),
		'created_at' => array(
			'form' => array('type'=>false),
		),
		'updated_at' => array(
			'form' => array('type'=>false),
		),
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
			'key_from' => 'writer_id',
			'model_to' => 'Model_Writer',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,		
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
