<br>
<table class="table table-striped table-borderd">
	<tr><th style="width:10%">id</th><th style="width:90%">作曲者名</th></tr>
	<?php foreach ($writers as $writer): ?>
		<tr>
			<td><?php echo $writer->id; ?></td>
			<td><?php echo $writer->name;?></td>
		</tr>
	<?php endforeach; ?>
</table>