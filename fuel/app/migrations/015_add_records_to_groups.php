<?php

namespace Fuel\Migrations;

class Add_records_to_groups
{
	public function up()
	{
		\DBUtil::add_fields('groups', array(
			'records' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('groups', array(
			'records'

		));
	}
}