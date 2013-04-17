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
					<h1><?php echo Html::anchor('songs','MusicDB'); ?><hr></h1>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="span3">
					<ul class="nav nav-list well">
						<li class="nav-header">メニュー</li>
						<li><a href="<?php echo Uri::create('songs'); ?>">曲一覧</a></li>
						<li><a href="<?php echo Uri::create('categories'); ?>">カテゴリ一覧</a></li>
						<li><a href="<?php echo Uri::create('writers'); ?>">作曲者一覧</a></li>
						<li class="nav-header">管理者メニュー</li>
						<li><a href="<?php echo Uri::create('owner'); ?>">自作カテゴリ管理</a></li>
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