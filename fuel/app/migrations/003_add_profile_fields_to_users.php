<?php

namespace Fuel\Migrations;

class Add_profile_fields_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'profile_fields' => array('type' => 'text'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'profile_fields'

		));
	}
}