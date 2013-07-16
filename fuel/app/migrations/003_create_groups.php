<?php

namespace Fuel\Migrations;

class Create_groups
{
	public function up()
	{
		\DBUtil::create_table('groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'school_id' => array('constraint' => 11, 'type' => 'int'),
			'group_name' => array('constraint' => 255, 'type' => 'varchar'),
			'group_member1' => array('constraint' => 255, 'type' => 'varchar'),
			'group_member2' => array('constraint' => 255, 'type' => 'varchar'),
			'group_member3' => array('constraint' => 255, 'type' => 'varchar'),
			'group_member4' => array('constraint' => 255, 'type' => 'varchar'),
			'group_member5' => array('constraint' => 255, 'type' => 'varchar'),
			'records' => array('constraint' => 11, 'type' => 'int'),
			'condition' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'timestamp'),
			'updated_at' => array('type' => 'timestamp'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('groups');
	}
}