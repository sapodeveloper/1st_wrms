<?php

class Controller_Manage_Control extends Controller_Manage
{	
	public function action_index()
	{
		$data['entries'] = Model_WaitGroupList::find('all', array('where' => array('condition' => 1)));
		$data['standbys'] = Model_WaitGroupList::find('all', array('where' => array('condition' => 2)));
		$data['launches'] = Model_WaitGroupList::find('all', array('where' => array('condition' => 3)));
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(打ち上げ管制管理画面)');
 		$view->content=View::forge('manage/control/index', $data);
 		return $view;
	}

	public function action_standby($id = null)
	{
		if ( ! $wgl = Model_WaitGroupList::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('index/manage/control');
		}
		$wgl->condition = 2;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('index/manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('index/manage/control');
		}
	}

	public function action_launch($id = null)
	{
		if ( ! $wgl = Model_WaitGroupList::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('index/manage/control');
		}
		$wgl->condition = 3;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('index/manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('index/manage/control');
		}
	}

	public function action_complete($id = null)
	{
		if ( ! $wgl = Model_WaitGroupList::find($id))
		{
			Session::set_flash('error', '指定されたidのエントリーは存在しません');
			Response::redirect('index/manage/control');
		}
		$wgl->condition = 4;
		if ($wgl->save())
		{
			Session::set_flash('success', '更新成功');
			Response::redirect('index/manage/control');
		}
		else
		{
			Session::set_flash('error', '更新失敗');
			Response::redirect('index/manage/control');
		}
	}
}
