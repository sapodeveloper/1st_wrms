<?php

namespace Fuel\Migrations;

class Add_event_id_to_records
{
	public function up()
	{
		\DBUtil::add_fields('records', array(
			'event_id' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('records', array(
			'event_id'

		));
	}
}