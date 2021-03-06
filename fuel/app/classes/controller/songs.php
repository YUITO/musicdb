<?php

class Controller_Songs extends Controller_Template
{
	
	public function before()
	{
		parent::before();
		if(!Auth::check() and !in_array(Request::active()->action, array('login','writercreate')))
		{
			Response::redirect('index.php/songs/login');
		}
	}
	
	public function action_index()
	{
		$data = array();
		
		$data['songs'] = Model_Song::find()
			->order_by('id', 'desc')
			->get();
		
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = '曲一覧';
		$this->template->content = View::forge('songs/list', $data);
	}
	public function action_view($id=0)
	{
		$data=array();
		$id and $data['song'] = Model_Song::find($id);
		if(!$data['song'])
		{
			Response::redirect('index.php/songs');
		}
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = $data['song']->title;
		$this->template->content = View::forge('songs/view',$data);
	}
	public function action_create()
	{
		$song = Model_Song::forge();
		//認証したUser_idを取ってきたい
		$song->writer_id = Arr::get(Auth::get_user_id(),1);
		$fieldset = Fieldset::forge()->add_model('Model_Song')->populate($song,true);
		
		$categories = Model_Category::find('all');
		$category_options = array();
		foreach ($categories as $category)
		{
			$category_options[$category->id] = $category->name;
		}
		
		$form = $fieldset->form();
		$form->field('category_id')->set_options($category_options);
		$form->add('submit', '' , array('type' => 'submit', 'value' => '新規作成', 'class' => 'btn btn-primary'));
		
		if ($fieldset->validation()->run())
		{
			$fields = $fieldset->validated();
			
			$song = Model_Song::forge();
			$song->title = $fields['title'];
			$song->body = $fields['body'];
			$song->category_id = $fields['category_id'];
			$song->writer_id = $fields['writer_id'];
			$song->URL = $fields['URL'];
			$song->comment = $fields['comment'];
		
			if($song->save())
			{
				Response::redirect('index.php/songs');
			}
		}
		
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = '曲の新規作成';
		$this->template->set('content', $form->build('index.php/songs/create'), false);
	}
	public function action_edit($id=0)
	{
		if ($id)
		{
			$song = Model_Song::find($id);
			//writerが違ったらeditできない
			
		}
		$fieldset = Fieldset::forge()->add_model('Model_Song')->populate($song,true);
			
		$categories = Model_Category::find('all');
		$category_options = array();
		foreach ($categories as $category)
		{
			$category_options[$category->id] = $category->name;
		}
		
		$form = $fieldset->form();
		$form->field('category_id')->set_options($category_options);
		$form->add('submit', '' , array('type' => 'submit', 'value' => '更新', 'class' => 'btn btn-primary'));
		
		if ($fieldset->validation()->run())
		{
			$fields = $fieldset->validated();
			
			$song = array(
				'title' => $fields['title'],
				'body' => $fields['body'],
				'category_id' => $fields['category_id'],
				'writer_id' => $fields['writer_id'],
				'URL' => $fields['URL'],
				'comment' => $fields['comment'],
			);
			
			$query = DB::update('songs');
			$query->set($song);
			$query->where('id', '=', $id);
		
			$result = $query->execute();
			Response::redirect('index.php/songs');
		}
		
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = '編集';
		$this->template->set('content', $form->build('index.php/songs/edit/' . $id), false);
	}
	public function action_delete($id=0)
	{
		if($id)
		{
			$query = DB::delete('songs')->where('id', '=', $id);
		}
		if($query->execute())
		{
			Response::redirect('index.php/songs');
		}
	}
	
	public function action_login()
	{
		Auth::check() and Response::redirect('index.php/songs');
		
		$data = array();
		
		$auth = Auth::instance();
		
		if (Input::post('username') and Input::post('password'))
		{
			$username = Input::post('username');
			$password = Input::post('password');
			$auth = Auth::instance();
			
			if ($auth->login($username, $password))
			{
				Response::redirect('index.php/songs');
			}
			else
			{
				$data['error'] = true;
			}
		}
		
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = 'ログイン';
		$this->template->content = View::forge('songs/login',$data);
	}
	
	public function action_logout()
	{
		$auth = Auth::instance();
		$auth->logout();
		
		Response::redirect('index.php/songs');
	}
	
	public function action_writercreate()
	{
		$writer = Model_Writer::forge();
		
		$fieldset = Fieldset::forge()->add_model('Model_Writer')->populate($writer,true);
		
		$form = $fieldset->form();
		
		$form->add('submit', '', array('type' => 'submit', 'value' => '新規登録', 'class' => 'btn btn-primary'));
		
		if ($fieldset->validation()->run())
		{
			$fields = $fieldset->validated();
			$auth = Auth::instance();
			$writer = Model_Writer::forge();
			$writer->username = $fields['username'];
			$writer->email = '';
			$writer->password = $auth->hash_password($fields['password']);
			$writer->name = $fields['name'];
			$writer->last_login = 0;
			$writer->login_hash = '';
			
			if($writer->save())
			{
				Response::redirect('index.php/songs');
			}
		}
		$this->template->writername = Auth::get_screen_name();
		$this->template->title = '新規ユーザ登録';
		$this->template->set('content', $form->build('index.php/songs/writercreate'), false);
	}
}

