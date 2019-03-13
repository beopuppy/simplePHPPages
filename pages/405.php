<?PHP Portal::send('title', '405') ?>

<?=Component::render('hero', [
    'title'=> 'Error 405 :-(',
    'subtitle'=> 'The requested path '.htmlspecialchars($path).' exists. But the request method '.htmlspecialchars($method).' is not allowed on this path!'
]) ?>
