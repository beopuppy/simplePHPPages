<div class="modal" id="modal-<?=$name ?>-<?=$id ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
  <header class="modal-card-head">
    <p class="modal-card-title">Edit <?=$id ?> <?=$name ?></p>
    <button class="delete" aria-label="close" onClick="removeClass('modal-<?=$name ?>-<?=$id ?>','is-active')"></button>
  </header>
  <section class="modal-card-body">
  <form id="form-<?=$name ?>-<?=$id ?>" method="post" action="/editable/<?=$name ?>/<?=$id ?>?component=<?=$component ?>">
    <?PHP
    foreach($fields as $field){
      if($field['type']=='textarea'){
        ?>
        <textarea name="<?=$field['name'] ?>" class="textarea" placeholder="<?=$field['placeholder'] ?>"><?=$data[$field['name']] ?></textarea>
        <?PHP
      }else{
      ?>
        <input name="<?=$field['name'] ?>" value="<?=$data[$field['name']] ?>" class="input" type="<?=$field['type'] ?>" placeholder="<?=$field['placeholder'] ?>">
      <?PHP
      }
    }
    ?>
  </form>
  </section>
  <footer class="modal-card-foot">
    <button class="button is-success" onClick="sendFormReplace('form-<?=$name ?>-<?=$id ?>','content-<?=$name ?>-<?=$id ?>');removeClass('modal-<?=$name ?>-<?=$id ?>','is-active');">Save changes</button>
    <button class="button" onClick="removeClass('modal-<?=$name ?>-<?=$id ?>','is-active')">Cancel</button>
  </footer>
  </div>
</div>
