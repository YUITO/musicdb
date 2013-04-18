<a href="<?php echo Uri::create('index.php/songs/create'); ?>" class="pull-right">新しい曲を作成する</a>
<table class="table table-striped table-borderd">
	<tr><th style="width:5%">id</th><th style="width:20%">曲名</th><th style="width:13%">作曲者</th><th style="width:13%">カテゴリ</th><th style="width:21%">コメント</th><th style="width:8%"></th><th style="width:10%"></th><th style="width:10%"></th></tr>
	<?php foreach ($songs as $song): ?>
		<tr>
			<td><?php echo $song->id; ?></td>
			<td><a href="<?php echo Uri::create('index.php/songs/view/' . $song->id); ?>"><?php echo $song->title;?></a></td>
			<td><?php echo $song->writer->name;?></td>
			<td><?php echo $song->category->name;?></td>
			<td><?php echo $song->comment;?></td>
			<td><a href="<?php echo Uri::create($song->URL); ?>"><input class="btn-success" value="DL" style="width:20px"></a></td>
			<td><a href="<?php echo Uri::create('index.php/songs/edit/' . $song->id); ?>" class="btn btn-primary" style="width:28px">編集</a></td>
			<td><a href="<?php echo Uri::create('index.php/songs/delete/' . $song->id); ?>" onclick="return confirm('本当に削除しますか？')" class="btn btn-danger" style="width:28px">削除</a></td>
		</tr>
	<?php endforeach; ?>
</table>