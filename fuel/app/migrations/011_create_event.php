<?php

namespace Fuel\Migrations;

class Create_event
{
	public function up()
	{
		\DBUtil::create_table('event', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'event_name' => array('constraint' => 255, 'type' => 'varchar'),
			'event_date' => array('type' => 'date'),
			'condition' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('event');
	}
}