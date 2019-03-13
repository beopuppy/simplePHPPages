<?PHP Portal::send('title', '404') ?>

<?=Component::render('hero', [
    'title'=> 'Error 404 :-(',
    'subtitle'=> 'The requested path '.htmlspecialchars($path).' was not found!'
]) ?>
