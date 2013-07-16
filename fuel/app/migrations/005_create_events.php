<?php

namespace Fuel\Migrations;

class Create_events
{
	public function up()
	{
		\DBUtil::create_table('events', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'event_name' => array('constraint' => 255, 'type' => 'varchar'),
			'event_date' => array('type' => 'date'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('events');
	}
}