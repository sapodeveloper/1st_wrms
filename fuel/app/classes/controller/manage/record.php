<?php

class Controller_Manage_Record extends Controller_Manage
{	
	public function action_index()
	{
		$data['records'] = Model_Record::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/all_record', $data);
 		return $view;
	}

	public function action_NullAllRecord()
	{
		$data['records'] = Model_Record::find('all', array('where' => array('condition' => 0)));
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/null_all_record', $data);
 		return $view;
	}

	public function action_GroupNullRecord()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/group_null_record');
 		return $view;
	}

	public function action_SearchRecord()
	{
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録管理画面)');
 		$view->content=View::forge('manage/record/search_record');
 		return $view;
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('index/manage/record');

		if ( ! $data['record'] = Model_Record::find($id))
		{
			Session::set_flash('error', 'Could not find record #'.$id);
			Response::redirect('index/manage/record');
		}

		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(登録高校詳細)');
 		$view->content=View::forge('manage/record/view', $data);
 		return $view;

	}

	public function action_EntryRecord()
	{
		$data['launches'] = Model_WaitGroupList::find('all', array('where' => array('condition' => 3)));
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録登録画面)');
 		$view->content=View::forge('manage/record/entry_record', $data);
 		return $view;
	}

	public function action_InputRecord($id = null)
	{
		$wgl = Model_WaitGroupList::find($id);
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
				));

				if ($record and $record->save())
				{
					Session::set_flash('success', '記録登録しました');

					Response::redirect('index/manage/record/EntryRecord');
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
		$data['launch'] = Model_WaitGroupList::find($id);
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(記録登録画面)');
 		$view->content=View::forge('manage/record/input_record', $data);
 		return $view;
	}

}
