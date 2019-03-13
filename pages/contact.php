<?PHP Portal::send('title', 'Contact') ?>

<?=Component::render('hero', [
    'title'=> 'Contact',
    'subtitle'=> 'Contact us'
]) ?>

<?=Component::render('contactform') ?>
