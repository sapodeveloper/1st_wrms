<?php

namespace Fuel\Migrations;

class Rename_table_event_to_events
{
	public function up()
	{
		\DBUtil::rename_table('event', 'events');
	}

	public function down()
	{
		\DBUtil::rename_table('events', 'event');
	}
}