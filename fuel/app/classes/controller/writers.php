<?php

class Controller_Writers extends Controller_Template
{
	public function before()
	{
		parent::before();
		if(!Auth::check() and !in_array(Request::active()->action, array('login')))
		{
			Response::redirect('index.php/songs/login');
		}
	}

	
	public function action_index()
	{
		$data = array();
		
		$data['writers'] = Model_Writer::find()
			->order_by('id', 'desc')
			->get();
		
		$this->template->title = '作曲者一覧';
		$this->template->content = View::forge('writers/list', $data);
	}
	
}