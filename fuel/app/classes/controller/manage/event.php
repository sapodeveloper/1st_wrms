<?php

class Controller_Manage_Event extends Controller_Manage
{	
	public function action_index()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(イベント管理画面)');
 		$view->content=View::forge('manage/event/index');
 		return $view;
	}

	public function action_NowEvent()
	{
		$data['events'] = Model_Event::find('all', array('where' => array('condition' => 1)));
 		$view=View::forge('manage/event/now_event', $data);
 		return $view;
	}

	public function action_NotStartEvent()
	{
		$data['events'] = Model_Event::find('all', array('where' => array('condition' => 0)));
 		$view=View::forge('manage/event/not_start_event', $data);
 		return $view;
	}

	public function action_AllEvent()
	{
		$data['events'] = Model_Event::find('all');
 		$view=View::forge('manage/event/all_event', $data);
 		return $view;
	}

	public function action_HideEvent()
	{
		$data['events'] = Model_Event::find('all', array('where' => array('condition' => 3)));
 		$view=View::forge('manage/event/Hide_event', $data);
 		return $view;
	}

	public function action_start($id=null)
	{
		$now_event = Model_Event::find('first', array('where' => array('condition' => 1)));
		if($now_event)
		{
			$now_event->condition = 2;
			$now_event->save();
		}
		$start_event = Model_Event::find($id);
		$start_event->condition = 1;
		$start_event->save();
		Response::redirect('manage/event');
	}

	public function action_complete($id=null)
	{
		$start_event = Model_Event::find($id);
		$start_event->condition = 2;
		$start_event->save();
		Response::redirect('manage/event');
	}

	public function action_hide($id=null)
	{
		$start_event = Model_Event::find($id);
		$start_event->condition = 3;
		$start_event->save();
		Response::redirect('manage/event');
	}

	public function action_reoutput($id=null)
	{
		$start_event = Model_Event::find($id);
		$start_event->condition = 2;
		$start_event->save();
		Response::redirect('manage/event');
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Event::validate('create');
			
			if ($val->run())
			{
				$event = Model_Event::forge(array(
					'event_name' => Input::post('event_name'),
					'event_date' => Input::post('event_date'),
					'condition' => 0,
				));

				if ($event and $event->save())
				{
					Session::set_flash('success', 'Added event #'.$event->id.'.');

					Response::redirect('manage/event');
				}

				else
				{
					Session::set_flash('error', 'Could not save event.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム');
 		$view->content=View::forge('manage/event/create');
 		return $view;
	}
}
