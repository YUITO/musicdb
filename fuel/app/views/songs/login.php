<?php echo Form::open('index.php/songs/login'); ?>
<fieldset>
	<?php if(isset($error)): ?>
		<div class="clearfix" style="color:red">
			ユーザ名またはパスワードが間違っています。
		</div>
	<?php endif; ?>	
	<div class="clearfix">
		<?php echo Form::label('ユーザID', 'username'); ?>
		<?php echo Form::input('username'); ?>
	</div>
	<div class="clearfix">
		<?php echo Form::label('パスワード', 'password'); ?>
		<?php echo Form::password('password'); ?>
	</div>
	<div class="actions">
		<?php echo Form::submit('submit','ログイン',array('class'=>'btn btn-primary')); ?>
	</div>
</fieldset>
<?php echo Form::close(); ?>
<a href="<?php echo Uri::create('index.php/songs/writercreate'); ?>">新規ユーザ登録はこちら</a>
