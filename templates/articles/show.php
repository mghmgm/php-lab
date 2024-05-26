<?php ob_start();
require(dirname(__DIR__).'/header.php');?>

    <div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?=$article->getName();?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
      <p class="card-text"><?=$article->getText();?></p>
      <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/edit/<?=$article->getId();?>" class="btn btn-primary">Edit Article</a>
      <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/delete/<?=$article->getId();?>" class="btn btn-warning">Delete Article</a>
    </div>
  </div>

  <form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/comments" method="POST" class="mt-3">
    <div class="form-group">
      <label for="text">Text comment</label>
      <textarea name="text" id="text" class="form-control"></textarea>
    </div>
    <input type="hidden" name="articleId" value="<?=$article->getId();?>">
    <input type="hidden" name="authorId" value="1">
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

  <?php foreach($comments as $comment):?>
      <div class="card mt-3" id="comment<?=$comment->getId();?>">
        <div class="card-body">
          <h6 class="card-subtitle mb-2 text-muted"><?=$comment->getAuthorId()->getNickname();?></h6>
          <p class="card-text"><?=$comment->getText();?></p>
          <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comment/<?=$comment->getId();?>/edit/" class="btn btn-primary">Edit Comment</a>
        </div>
      </div>

  <?php endforeach;
require(dirname(__DIR__).'/footer.php');
ob_end_flush();?>