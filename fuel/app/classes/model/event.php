<?php

class Model_Event extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'event_name',
		'event_date',
		'condition',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'events';

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('event_name',    'Event Name',   'required|max_length[255]');
		$val->add_field('event_date', 'Event Date', 'required|max_length[255]');
		return $val;
	}

}
