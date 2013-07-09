<?php

namespace Fuel\Migrations;

class Rename_table_wait_group_list_to_entry_lists
{
	public function up()
	{
		\DBUtil::rename_table('wait_group_list', 'entry_lists');
	}

	public function down()
	{
		\DBUtil::rename_table('entry_lists', 'wait_group_list');
	}
}