<?php
    include "views/static/header.php";
    include "models/articles/functions.php";
    $article = getArticleByIdArt($_GET['id']);

?>
<div class="container text-center" id="#cont">
    
    <div id="slider">
    <?php if(count($article->big) > 1): ?>
    <a href="#" class="control_next">&gt;&gt;</a>
    <a href="#" class="control_prev">&lt;&lt;</a>"
    <?php endif; ?>
    <?php if(count($article->big) > 1) echo "<ul>"; ?>
            <?php
                foreach($article->big as $b):
            ?>

                <li><img class="img-responsive" src="<?= $b->big ?>" alt="Article photo"></li>
            
            <?php endforeach; ?>

            
    <?php if(count($article->big) > 1) echo "</ul>"; ?>
</div>
<h2 class="text-white text-center"><?= $article->heading ?></h2>
<p class="text-white text-center"><?= $article->text ?></p>
<br>
<a href="index.php?page=users" class=" btn btn-primary btn-lg active" role="button" aria-pressed="true">Back to articles</a>
</div>
