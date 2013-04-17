<a href="<?php echo Uri::create('categories/create'); ?>" class="pull-right">新しいカテゴリを作成する</a>
<table class="table table-striped table-borderd">
	<tr><th style="width:10%">id</th><th style="width:70%">カテゴリ名</th><th style="width:10%"></th><th style="width:10%"></th></tr>
	<?php foreach ($categories as $category): ?>
		<tr>
			<td><?php echo $category->id; ?></td>
			<td><?php echo $category->name;?></td>
			<td><a href="<?php echo Uri::create('categories/edit/' . $category->id); ?>" class="btn btn-primary" style="width:28px">編集</a></td>
			<td><a href="<?php echo Uri::create('categories/delete/' . $category->id); ?>" onclick="return confirm('本当に削除しますか？')" class="btn btn-danger" style="width:28px">削除</a></td>
		</tr>
	<?php endforeach; ?>
</table>