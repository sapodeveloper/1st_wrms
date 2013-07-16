<?php

namespace Fuel\Migrations;

class Create_schools
{
	public function up()
	{
		\DBUtil::create_table('schools', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'school_name' => array('constraint' => 255, 'type' => 'varchar'),
			'school_url' => array('constraint' => 255, 'type' => 'varchar'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('schools');
	}
}