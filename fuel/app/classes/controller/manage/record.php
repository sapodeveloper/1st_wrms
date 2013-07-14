<?php

class Controller_Manage_Record extends Controller_Manage
{	
	public function action_index()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/index');
 		return $view;
	}

	public function action_AllRecord()
	{
		$data['records'] = Model_Record::find('all');
 		$view=View::forge('manage/record/record', $data);
 		return $view;
	}

	public function action_ValidRecord()
	{
		$data['records'] = Model_Record::find('all', array('where' => array('condition' => 1)));
 		$view=View::forge('manage/record/record', $data);
 		return $view;
	}

	public function action_NotValidRecord()
	{
		$data['records'] = Model_Record::find('all', array('where' => array(array('condition' => 2),'or' => array(array('condition' => 3),'or' => array(array('condition' => 4))))));
 		$view=View::forge('manage/record/record', $data);
 		return $view;
	}

	public function action_SearchRecord()
	{
 		$view=View::forge('manage/record/search_record');
 		return $view;
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('manage/record');

		if ( ! $data['record'] = Model_Record::find($id))
		{
			Session::set_flash('error', 'Could not find record #'.$id);
			Response::redirect('manage/record');
		}

		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校詳細)');
 		$view->content=View::forge('manage/record/view', $data);
 		return $view;

	}

	public function action_EntryRecord()
	{
		$data['launches'] = Model_EntryLists::find('all', array('where' => array('condition' => 3)));
		$data['standbys'] = Model_EntryLists::find('all', array('where' => array('condition' => 2)));
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録登録画面)');
 		$view->content=View::forge('manage/record/entry_record', $data);
 		return $view;
	}

	public function action_InputRecord($id = null)
	{
		$event = Model_Event::find('first', array('where' => array('condition' => 1)));
		$wgl = Model_EntryLists::find($id);
		if (Input::method() == 'POST')
		{
			$val = Model_Record::validate('create');
			
			if ($val->run())
			{
				$record = Model_Record::forge(array(
					'group_id' => Input::post('group_id'),
					'x_distance' => Input::post('x_distance'),
					'y_distance' => Input::post('y_distance'),
					'condition' => Input::post('condition'),
					'event_id' => $event->id,
				));

				if ($record and $record->save())
				{
					$result = DB::select('*')->from('records')->where('group_id', $record->group_id)->execute();
					$num_rows = count($result);
					$group = Model_Group::find($record->group_id);
					$group->records = $num_rows;
					$group->save();

					Session::set_flash('success', '記録登録しました');

					Response::redirect('manage/record/EntryRecord');
				}

				else
				{
					Session::set_flash('error', '記録登録に失敗しました');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$data['decision'][1] = '有効';
		$data['decision'][2] = '無効(測定不可)';
		$data['decision'][3] = '無効(有効測定回数外)';
		$data['decision'][4] = '無効(例外)';
		$data['launch'] = Model_EntryLists::find($id);
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録登録画面)');
 		$view->content=View::forge('manage/record/input_record', $data);
 		return $view;
	}

	public function action_GroupRecord($id = null)
	{
		$data['max_record'] = Model_Record::find('first', array('where' => array('group_id' => $id), 'order_by' => array('y_distance' => 'desc')));
		$data['group_records'] = Model_Record::find('all', array('where' => array('group_id' => $id)));
		$data['group_name'] = Model_Group::find($id);
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(グループ記録画面)');
 		$view->content=View::forge('manage/record/group_record', $data);
 		return $view;
	}

	public function action_NextStep($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/record/EntryRecord');
		}
		$wgl->condition = 3;
		if ($wgl->save())
		{
			Session::set_flash('success', '指定グループのフェーズを完了にしました');
			Response::redirect('manage/record/EntryRecord');
		}
		else
		{
			Session::set_flash('error', '処理失敗');
			Response::redirect('manage/record/EntryRecord');
		}
	}

	public function action_complete($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/record/EntryRecord');
		}
		$wgl->condition = 4;
		if ($wgl->save())
		{
			Session::set_flash('success', '指定グループのフェーズを完了にしました');
			Response::redirect('manage/record/EntryRecord');
		}
		else
		{
			Session::set_flash('error', '処理失敗');
			Response::redirect('manage/record/EntryRecord');
		}
	}

	public function action_edit($id=null){
		$view=View::forge('layout/manage');
		is_null($id) and Response::redirect('manage/record/GroupRecord/'.$record->group_id);

		if ( ! $record = Model_Record::find($id))
		{
			Session::set_flash('error', '指定されたidの測定記録は存在しません');
			Response::redirect('manage/record/GroupRecord/'.$record->group_id);
		}

		$val = Model_Record::validate('edit');

		if ($val->run())
		{
			$record->x_distance = Input::post('x_distance');
			$record->y_distance = Input::post('y_distance');
			$record->condition = Input::post('condition');
			$record->event_id = Input::post('event_id');

			if ($record->save())
			{
				Session::set_flash('success', '更新成功');
				Response::redirect('manage/record/GroupRecord/'.$record->group_id);
			}
			else
			{
				Session::set_flash('error', '更新失敗');
			}
		}
		$data['record'] = Model_Record::find($id);
		$event_data = Model_Event::find('all');
		foreach($event_data as $row):
			$data['event_data'][$row->id]=$row->event_name;
		endforeach;
		$data['decision'][1] = '有効';
		$data['decision'][2] = '無効(測定不可)';
		$data['decision'][3] = '無効(有効測定回数外)';
		$data['decision'][4] = '無効(例外)';

 		$view->set_global('title','水ロケット管理システム(既存レコード情報編集画面)');
 		$view->content=View::forge('manage/record/edit',$data);
 		return $view;
	}

}
