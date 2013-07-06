<?php

class Controller_Main extends Controller
{
	public function action_index()
	{
		$data['records'] = Model_Record::find('all', array('where' => array('condition' => 1), 'order_by' => array('x_distance' => 'desc'), 'limit' => 10));
 		$data['wait_group_lists'] = Model_WaitGroupList::find('all', array('where' => array('condition' => 0)));
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/index', $data);
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}

	public function action_CreateGroup()
	{
 		$view=View::forge('layout/application');
 		$view->set_global('title','水ロケット管理システム');
 		$view->header=View::forge('layout/header');
 		$view->content=View::forge('main/index');
 		$view->footer=View::forge('layout/footer');
 		return $view;
	}


}
