<?php require(dirname(__DIR__).'/header.php');?>
<form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comment/<?=$comment->getId();?>/update/" method="POST">
  <div class="form-group">
    <label for="text">Text comment</label>
    <textarea name="text" id="text" class="form-control"><?=$comment->getText();?></textarea>
  </div>
  <input type="hidden" name="authorId" value="1">
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php require(dirname(__DIR__).'/footer.php');?>