<?php

class Controller_Manage extends Controller
{
	public function before()
	{
		# もし認証チェックしてNGだったら
		if(!Auth::check())
		{
			# ログインページへ移動
			Response::redirect('session/login');
		}else{
			# 認証問題なければ何もしない
		}
	}
	
	public function action_index()
	{
		$data['event']         = Model_Event::find('first', array('where' => array('condition' => 1)));
		$event_data            = Model_Event::find('first', array('where' => array('condition' => 1)));
		if($event_data)
		{
			$event_id              = $event_data->id;
		}
		else
		{
			$event_id              = 0;
		}
		$data['record']        = Model_Record::find('all', array('where' => array('condition' => 1)));
		# 状況
		$data['create_rokect'] = count(DB::select()->from('entries')->where('condition', '=', 1)->execute());
		$data['standby']       = count(DB::select()->from('entries')->where('condition', '=', 2)->execute());
		$data['recording']     = count(DB::select()->from('entries')->where('condition', '=', 3)->execute());
		$data['repair_rokect'] = count(DB::select()->from('entries')->where('condition', '=', 7)->execute());
		# 記録状況
		$query = DB::select()->from('records');
		$data['all_records'] = count($query->execute());
		$all_distances = Model_Record::find('all');
		$sum = 0;
		foreach ($all_distances as $all_distance)
		{
			$sum += $all_distance->y_distance;
		}
		$data['ave_distance'] = $sum / $data['all_records'];
		$max_records = Model_Record::find('first', array('order_by' => array('y_distance' => 'desc')));
		if($max_records)
		{
			$data['max_distance'] = $max_records->y_distance;
		}
		else
		{
			$data['max_distance'] = 0;
		}

		$data['event_records'] = count($query->where('event_id', '=', $event_id)->execute());
		$event_all_distances = Model_Record::find('all', array('where' => array('event_id' => $event_id)));
		$sum = 0;
		foreach ($event_all_distances as $event_all_distance)
		{
			$sum += $event_all_distance->y_distance;
		}
		if($sum == 0)
		{
			$data['event_ave_distance'] = 0;
		}
		else
		{
			$data['event_ave_distance'] = $sum / $data['event_records'];
		}
		$max_records = Model_Record::find('first', array('where' => array('event_id' => $event_id), 'order_by' => array('y_distance' => 'desc')));
		if($max_records)
		{
			$data['event_max_distance'] = $max_records->y_distance;
		}
		else
		{
			$data['event_max_distance'] = 0;
		}
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(管理画面)');
 		$view->content=View::forge('manage/index', $data);
 		return $view;
	}
}
