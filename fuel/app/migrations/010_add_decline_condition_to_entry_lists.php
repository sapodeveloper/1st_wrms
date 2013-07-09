<?php

namespace Fuel\Migrations;

class Add_decline_condition_to_entry_lists
{
	public function up()
	{
		\DBUtil::add_fields('entry_lists', array(
			'decline_condition' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('entry_lists', array(
			'decline_condition'

		));
	}
}