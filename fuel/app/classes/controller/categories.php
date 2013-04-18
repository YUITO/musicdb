<?php

class Controller_Categories extends Controller_Template
{
	
	public function action_index()
	{
		$data = array();
		
		$data['categories'] = Model_Category::find()
			->order_by('id', 'desc')
			->get();
		
		$this->template->title = 'カテゴリ一覧';
		$this->template->content = View::forge('categories/list', $data);
	}
	
	public function action_create()
	{
		$category = Model_Category::forge();
		$fieldset = Fieldset::forge()->add_model('Model_Category')->populate($category,true);
		$form = $fieldset->form();
		$form->add('submit', '', array('type' => 'submit', 'value' => '作成', 'class'=>'btn btn-primary'));
		
		if ($fieldset->validation()->run())
		{
			$fields = $fieldset->validated();
			$category = Model_Category::forge();
			$category->name = $fields['name'];
			if($category->save())
			{
				Response::redirect('index.php/categories');
			}
		}
		
		$this->template->title = 'カテゴリ新規作成';
		$this->template->set('content', $form->build(), false);
	}
	
	public function action_edit($id=0)
	{
		if ($id)
		{
			$category = Model_Category::find($id);
			//writerが違ったらeditできない
			
		}
		$fieldset = Fieldset::forge()->add_model('Model_Category')->populate($category,true);

		$form = $fieldset->form();
		$form->add('submit', '' , array('type' => 'submit', 'value' => '更新', 'class' => 'btn btn-primary'));
		
		if ($fieldset->validation()->run())
		{
			$fields = $fieldset->validated();
			
			$category = array(
				'name' => $fields['name'],
			);
			
			$query = DB::update('categories');
			$query->set($category);
			$query->where('id', '=', $id);
		
			$result = $query->execute();
			Response::redirect('index.php/categories');
		}
		
		$this->template->title = '編集';
		$this->template->set('content', $form->build(), false);
		
	}
	
	public function action_delete($id=0)
	{
		if($id)
		{
			$query = DB::delete('categories')->where('id', '=', $id);
		}
		if($query->execute())
		{
			Response::redirect('index.php/categories');
		}
		
	}
}
