<?php

class Controller_Manage_Entry extends Controller_Manage
{
	public function action_index()
	{
		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(エントリー管理画面)');
 		$view->content=View::forge('manage/entry/index');
 		return $view;
	}
}