<?php
include "views/static/header.php";
require_once "models/articles/functions.php";
require_once "models/users/functions.php";
?>
<div class="container">
    <h1 class="text-white">Articles</h1>
    <select class="form-control" id="userChange">
        <option value="0">--SELECT USER---</option>
        <?php
            $users = getUsers();
            foreach($users as $user):
        ?>
        <option value="<?=$user->idUser?>"><?= $user->username ?></option>
            <?php endforeach; ?>
    </select>
    <div class="row d-flex flex-wrap" id="articles">
        <?php
            $articles = getAllArticles(1);
            foreach($articles as $article){
                include "views/templates/article.php";
            }
        ?>
        

    </div>
    <div class="row">
            
        <nav aria-label="...">
        <ul class="pagination pagination-lg" id="pagin">
       
                
            
            
        </ul>
        </nav>
    </div>
</div>