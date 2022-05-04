<?php 
  include_once('model/articles.php');
  include_once('auxillary.php');

  $cats = fetchCats();

  $fields = ['title' => '', 'content' => '', 'id_cat' => ''];
  $err = '';

  if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $fields = fillFieldsFromPost();
    $dt = date('Y-d-m H:i:s');
    if($fields['title'] === '' ||  $fields['content'] === ''){
      $err = 'fill';
    }else{
      addArticle($fields);
      header("Location: index.php");
    }
  }
?>
<form method="POST">
  Title: <br><input type="text" name="title" value="<?= $fields['title'] ?>">
  Content:<br><textarea  name="content"><?= $fields['content'] ?></textarea>
  Cats: <br><select name="id_cat" id="">
    <? foreach($cats as $key => $value ): ?>
      <option value="<?= $value['id_cat'] ?>"><?= $value['title'] ?></option>
    <? endforeach; ?>
  </select>
  <button type="submit">Send</button>
  <p><?=$err?></p>
</form>;