<p class="pull-right"><span style="font-size:16px">作曲： <span style="font-weight: bold"><?php echo $song->writer->name; ?></span></span>
	 (<?php echo $song->category->name; ?>) 
	　<?php echo date("Y-m-d H:i:s", $song->updated_at); ?> 更新</p>
<div style="margin-top:25px;margin-left:10px">
	<?php echo nl2br($song->body); ?>
</div>