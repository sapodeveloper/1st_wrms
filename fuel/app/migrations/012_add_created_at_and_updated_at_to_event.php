<?php

namespace Fuel\Migrations;

class Add_created_at_and_updated_at_to_event
{
	public function up()
	{
		\DBUtil::add_fields('event', array(
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('event', array(
			'created_at'
,			'updated_at'

		));
	}
}