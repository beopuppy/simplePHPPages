<!DOCTYPE html>
<html lang="en">

	<head>

		<title><?=Portal::receive('title') ?> - Dave Rupp's Auction Miami Dade </title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<link rel="stylesheet" href="/themes/default/assets/css/site.css">
		<?=Portal::receive('css') ?>

		<?=Portal::receive('head') ?>

	</head>

	<body>
		<div class="container">
			<img src="/themes/default/assets/images/Top.png" alt="Ft. Lauderdaleauction Top" class="img-top">
			<?=Component::render('navigation', ['userInfo' => $userInfo]) ?>

			<div class="content">
				<?=Portal::receive('main') ?>
			</div>
		</div>
		

		<?=Component::render('footer', ['text' => '&copy;COPYRIGHT 2009 - 2020 - FT. LAUDERALE BEACH COLLECTOR CAR AUCTION - PRESENT BY DAVE RUPP']) ?>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="/themes/default/assets/js/app.js"></script>
		
		<?=Portal::receive('js') ?>

	</body>

</html>
