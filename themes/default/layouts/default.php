<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Default Page - <?=Portal::receive('title') ?></title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="/themes/default/assets/css/bulma-0.7.2/css/bulma.min.css">

		<?=Portal::receive('css') ?>

		<?=Portal::receive('head') ?>

	</head>

	<body>

		<?=Component::render('navigation') ?>

		<?=Portal::receive('main') ?>

		<?=Component::render('footer', ['text' => 'Copyright 2019']) ?>

		<script src="/themes/default/assets/js/app.js"></script>

		<?=Portal::receive('js') ?>

	</body>

</html>
