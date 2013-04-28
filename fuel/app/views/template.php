<!DOCTYPE html>
<html>
	<head>
		<meta carset="utf-8">
		<title><?php echo $title; ?></title>
		<?php echo Asset::css('bootstrap.css'); ?>
		<style>
			body { margin: 50px; }
			.page-links a{margin:0 10px}
			.page-links .active{margin:0 10px; text-decoration: underline}
		</style>
	</head>
	<body>
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<?php if(Auth::check()): ?>
						<p class="pull-right" style="margin-top:25px;">ログイン　｜　<?php echo Html::anchor('index.php/songs/logout','ログアウト');?></p>
					<?php else: ?>
						<p class="pull-right" style="margin-top:25px;"><?php echo Html::anchor('index.php/songs/login','ログイン');?>　｜ ログアウト</p>
					<?php endif; ?>
					<h1><a href="<?php echo Uri::create('index.php/songs'); ?>">MusicDB</a><hr></h1>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="span3">
					<ul class="nav nav-list well">
						<li class="nav-header">メニュー</li>
						<li><a href="<?php echo Uri::create('index.php/songs'); ?>">曲一覧</a></li>
						<li><a href="<?php echo Uri::create('index.php/categories'); ?>">カテゴリ一覧</a></li>
						<li><a href="<?php echo Uri::create('index.php/writers'); ?>">作曲者一覧</a></li>
						<li class="nav-header">管理者メニュー</li>
						<li><a href="<?php echo Uri::create('index.php/owners'); ?>">自作カテゴリ管理</a></li>
					</ul>
				</div>
				<div class="span9">
					<h2>
						<?php echo $title; ?>
					</h2>
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	</body>
</html>