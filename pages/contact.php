<?PHP Portal::in('title', 'Contact form') ?>

<?=Content::render('titles','contact','hero'); ?>

<section class="container content">

	<h1 class="title">Contact</h1>

	<?=Component::render('contactform') ?>

</section>
