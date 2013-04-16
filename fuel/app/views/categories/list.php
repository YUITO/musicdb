<a href="<?php echo Uri::create('categories/create'); ?>" class="pull-right">新しいカテゴリを作成する</a>
<table class="table table-striped table-borderd">
	<tr><th style="width:10%">id</th><th style="width:70%">カテゴリ名</th><th style="width:10%"></th><th style="width:10%"></th></tr>
	<?php foreach ($categories as $category): ?>
		<tr>
			<td><?php echo $category->id; ?></td>
			<td><?php echo $category->name;?></td>
			<td><input class="btn btn-primary" value="編集" style="width:25px"></td>
			<td><input class="btn btn-danger" value="削除" style="width:25px"></td>
		</tr>
	<?php endforeach; ?>
</table>