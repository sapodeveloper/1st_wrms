<?php

class Controller_Manage_Control extends Controller_Manage
{	
	public function action_index()
	{
		$data['entries'] = Model_EntryLists::find('all', array('where' => array('condition' => 1), 'order_by' => array('updated_at' => 'asc')));
		$data['standbys'] = Model_EntryLists::find('all', array('where' => array('condition' => 2), 'order_by' => array('updated_at' => 'asc')));
		$data['launches'] = Model_EntryLists::find('all', array('where' => array('condition' => 3), 'order_by' => array('updated_at' => 'asc')));
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(打ち上げ管制管理画面)');
 		$view->content=View::forge('manage/control/index', $data);
 		return $view;
	}

	public function action_standby($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/control');
		}
		$wgl->condition = 2;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/control');
		}
	}

	public function action_launch($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/control');
		}
		$wgl->condition = 3;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/control');
		}
	}

	public function action_complete($id = null)
	{
		if ( ! $wgl = Model_EntryLists::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('manage/control');
		}
		$wgl->condition = 4;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('manage/control');
		}
	}
}
