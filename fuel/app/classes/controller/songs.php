<?php

class Controller_Songs extends Controller_Template
{
	
	public function action_index()
	{
		$data = array();
		
		$data['songs'] = Model_Song::find()
			->order_by('id', 'desc')
			->get();
		
		$this->template->title = '曲一覧';
		$this->template->content = View::forge('songs/list', $data);
	}
}
