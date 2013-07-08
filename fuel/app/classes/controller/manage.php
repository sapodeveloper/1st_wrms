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
 		$view=View::forge('layout/manage');
 		$view->set_global('title','水ロケット管理システム(管理画面)');
 		$view->content=View::forge('manage/index');
 		return $view;
	}
}
