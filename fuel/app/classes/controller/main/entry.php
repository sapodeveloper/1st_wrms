<?php

class Controller_Main_Entry extends Controller_Main
{
	public function action_index()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Entry::validate('create');
			
			if ($val->run())
			{
				$wgl = Model_Entry::forge(array(
					'group_id' => Input::post('group_id'),
					'condition' => 0,
					'decline_condition' => 0,
				));
				if($wgl->group_id == 0)
				{
					Session::set_flash('error', 'グループを選択してください');
					Response::redirect('main/entry');
				}

				if ($wgl and $wgl->save())
				{
					Session::set_flash('success', 'エントリーを受け付けました');
					Response::redirect('/');
				}

				else
				{
					Session::set_flash('error', 'エントリーに失敗しました。お近くのスタッフまでお願いします。');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}
		$school_data = Model_School::find('all');
		$data['school_data'][0] = '----------高校を選択してください----------';
		foreach($school_data as $row):
			$data['school_data'][$row->id]=$row->school_name;
		endforeach;
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/entry/create', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_GroupList($id = null)
	{
		$group_data  = Model_Group::find('all', array('where' => array('school_id' => $id)));
		if($group_data){
			$select_data['group_data'][0] = '----------グループを選択してください----------';
			foreach($group_data as $row):
				$select_data['group_data'][$row->id]=$row->group_name;
			endforeach;
		}else{
			$select_data['group_data'][0] = '------該当高校のグループはありません------';
		}
 		$view=View::forge('main/entry/group_list', $select_data);
 		return $view;
	}

}
