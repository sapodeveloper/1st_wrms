<?php

namespace Fuel\Migrations;

class Create_entries
{
	public function up()
	{
		\DBUtil::create_table('entries', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'group_id' => array('constraint' => 11, 'type' => 'int'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'decline_condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('entries');
	}
}