<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Default Page - <?=Portal::out('title') ?></title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="themes/default/assets/css/bulma-0.7.2/css/bulma.min.css">

		<?=Portal::out('css') ?>

		<script src="themes/default/assets/js/app.js"></script>

		<?=Portal::out('js') ?>

		<?=Portal::out('head') ?>

	</head>

	<body>

		<?=Component::render('navigation') ?>

		<?=Portal::out('main') ?>

		<?=Content::render('footer','general','footer'); ?>

		<?=Portal::out('modals') ?>

	</body>

</html>
