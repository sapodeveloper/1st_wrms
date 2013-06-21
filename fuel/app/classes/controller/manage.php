<?php

class Controller_Manage extends Controller
{
	public function action_index()
	{
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム(管理画面)');
 		$view->header=View::forge('layout/manage_header');
 		$view->content=View::forge('manage/index');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}
}
