<div class="card moja" style="width: 18rem;">
  <img src="<?= $article->big?>" class="card-img-top" alt="<?=$article->heading?>">
  <div class="card-body">
    <h5 class="card-title"><?=$article->heading?></h5>
    <p class="card-text"><?=$article->text?></p>
    <a href="index.php?page=singleArticle&id=<?=$article->idArticle?>" class="btn btn-primary">Read more</a>
  </div>
</div>