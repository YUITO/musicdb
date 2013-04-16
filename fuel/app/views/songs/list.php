<a href="<?php echo Uri::create('songs/create'); ?>" class="pull-right">新しい曲を作成する</a>
<table class="table table-striped table-borderd">
	<tr><th style="width:5%">id</th><th style="width:20%">曲名</th><th style="width:15%">作曲者</th><th style="width:15%">カテゴリ</th><th style="width:17%">コメント</th><th style="width:8%"></th><th style="width:10%"></th><th style="width:10%"></th></tr>
	<?php foreach ($songs as $song): ?>
		<tr>
			<td><?php echo $song->id; ?></td>
			<td><a href="<?php echo Uri::create('songs/view/' . $song->id); ?>"><?php echo $song->title;?></a></td>
			<td><?php echo $song->writer->name;?></td>
			<td><?php echo $song->category->name;?></td>
			<td><?php echo $song->comment;?></td>
			<td><a href="*"><input class="btn-success" value="DL" style="width:20px"></a></td>
			<td><input class="btn btn-primary" value="編集" style="width:25px"></td>
			<td><input class="btn btn-danger" value="削除" style="width:25px"></td>
		</tr>
	<?php endforeach; ?>
</table>