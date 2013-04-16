<?php

namespace Fuel\Migrations;

class Create_songs
{
	public function up()
	{
		\DBUtil::create_table('songs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'category_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 50, 'type' => 'varchar'),
			'body' => array('type' => 'text'),
			'writer_id' => array('constraint' => 11, 'type' => 'int'),
			'URL' => array('constraint' => 255, 'type' => 'varchar'),
			'comment' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('songs');
	}
}