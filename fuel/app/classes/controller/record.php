<?php

class Controller_Record extends Controller
{
	public function action_index()
	{
		$data['distance'] = Model_Record::find('all', array('where' => array('condition' => 1), 'order_by' => array('y_distance' => 'desc'), 'limit' => 10));
		$query = DB::query('SELECT distinct X.id ,school_name ,group_name ,X.y_distance
								FROM records as X
								inner join groups on X.group_id = groups.id
								inner join schools on groups.school_id = schools.id
									where (X.y_distance, X.group_id)
										in (select max(Y.y_distance), Y.group_id from records as Y group by Y.group_id)
											order by y_distance desc limit 10');
		$data['group_records'] = $query->as_object()->execute()->as_array();
		$today = strtotime(date('Ymd'));
		$data['today_records'] = Model_Record::find('all', array('where' => array(array('condition' => 1), array('created_at', '>', $today)), 'order_by' => array('y_distance' => 'desc'), 'limit' => 10));
 		$view=View::forge('layout/record');
 		$view->set_global('title','水ロケット大会記録');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('record/index', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_pause()
	{
		$data['distance'] = Model_Record::find('all', array('where' => array('condition' => 1), 'order_by' => array('y_distance' => 'desc'), 'limit' => 10));
		$query = DB::query('SELECT X.id ,school_name ,group_name ,X.y_distance
								FROM records as X
								inner join groups on X.group_id = groups.id
								inner join schools on groups.school_id = schools.id
									where (X.y_distance, X.group_id)
										in (select max(Y.y_distance), Y.group_id from records as Y group by Y.group_id)
											order by y_distance desc');
		$data['group_records'] = $query->as_object()->execute()->as_array();
		$today = strtotime(date('Ymd'));
		$data['today_records'] = Model_Record::find('all', array('where' => array(array('condition' => 1), array('created_at', '>', $today)), 'order_by' => array('y_distance' => 'desc'), 'limit' => 10));
 		$view=View::forge('layout/record');
 		$view->set_global('title','水ロケット大会記録');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('record/pause', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
