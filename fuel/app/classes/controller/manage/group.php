<?php

class Controller_Manage_Group extends Controller_Manage
{	
	public function action_index()
	{
		$data['groups'] = Model_Group::find('all');
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(グループ管理画面)');
 		$view->content=View::forge('manage/group/index', $data);
 		return $view;
	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Group::validate('create');
			
			if ($val->run())
			{
				$group = Model_Group::forge(array(
					'school_id' => Input::post('school_id'),
					'group_name' => Input::post('group_name'),
					'group_member1' => Input::post('group_member1'),
					'group_member2' => Input::post('group_member2'),
					'group_member3' => Input::post('group_member3'),
					'group_member4' => Input::post('group_member4'),
					'group_member5' => Input::post('group_member5'),
					'condition' => 1,
				));

				if ($group and $group->save())
				{
					Session::set_flash('success', 'Added school #'.$group->id.'.');

					Response::redirect('index/manage/group');
				}

				else
				{
					Session::set_flash('error', 'Could not save school.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		
		$school_data=Model_School::find('all');
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;

 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(新規グループ登録画面)');
 		$view->content=View::forge('group/create',$data);
 		return $view;
	}

	public function action_edit($id = null)
	{
		$view=View::forge('layout/manage');
		is_null($id) and Response::redirect('index/manage/group');

		if ( ! $group = Model_Group::find($id))
		{
			Session::set_flash('error', '指定されたidのグループは存在しません');
			Response::redirect('index/manage/group');
		}

		$val = Model_Group::validate('edit');

		if ($val->run())
		{
			$group->school_id = Input::post('school_id');;
			$group->group_name    = Input::post('group_name');
			$group->group_member1 = Input::post('group_member1');
			$group->group_member2 = Input::post('group_member2');
			$group->group_member3 = Input::post('group_member3');
			$group->group_member4 = Input::post('group_member4');
			$group->group_member5 = Input::post('group_member5');

			if ($group->save())
			{
				Session::set_flash('success', '更新成功');
				Response::redirect('index/manage/group');
			}
			else
			{
				Session::set_flash('error', '更新失敗');
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$group->group_name    = $val->validated('group_name');
				$group->group_member1 = $val->validated('group_member1');
				$group->group_member2 = $val->validated('group_member2');
				$group->group_member3 = $val->validated('group_member3');
				$group->group_member4 = $val->validated('group_member4');
				$group->group_member5 = $val->validated('group_member5');
				Session::set_flash('error', $val->error());
			}

			$view->set_global('group', $group, false);
		}
		$school_data=Model_School::find('all');
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;

 		$view->set_global('title','水ロケット管理システム(既存グループ情報編集画面)');
 		$view->content=View::forge('manage/group/edit',$data);
 		return $view;

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('index/manage/group');

		if ($group = Model_Group::find($id))
		{
			$group->delete();
			Session::set_flash('success', '指定されたグループ情報を削除しました');
		}
		else
		{
			Session::set_flash('error', '指定された高校情報の削除に失敗しました。');
		}

		Response::redirect('index/manage/group');

	}

	public function action_CreateRecord($id = null)
    {
       is_null($id) and Response::redirect('index/manage/group');

       if (! $group = Model_Group::find($id))
       {
               Session::set_flash('error', '指定されたidのグループのレコードは存在しません');
               Response::redirect('index/manage/group');
       }
       # 任意のグループidを持つグループにおいて、記録状態フラグが0の記録が存在する場合レコードの発行が出来ない
       if (! $record = Model_Record::find('all', array('where' => array('group_id' => $id, 'condition' => 0))))
       {
            $record = Model_Record::forge(array(
				'group_id' => $id,
				'x_distance' => 0,
				'y_distance' => 0,
				'condition' => 0,
			));
			$record->save();
			$record = Model_Record::forge(array(
				'group_id' => $id,
				'x_distance' => 0,
				'y_distance' => 0,
				'condition' => 0,
			));
			$record->save();
			Session::set_flash('success', '空レコード発行');
			Response::redirect('index/manage/group');

       }
       else
       {
       		Session::set_flash('error', 'レコードは既に存在します。');
			Response::redirect('index/manage/group');
       }
    }
}
