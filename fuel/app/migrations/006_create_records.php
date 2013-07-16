<?php

namespace Fuel\Migrations;

class Create_records
{
	public function up()
	{
		\DBUtil::create_table('records', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'group_id' => array('constraint' => 11, 'type' => 'int'),
			'event_id' => array('constraint' => 11, 'type' => 'int'),
			'x_distance' => array('type' => 'double'),
			'y_distance' => array('type' => 'double'),
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('records');
	}
}