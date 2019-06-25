<?php
    include "views/static/header.php";
    include "models/articles/functions.php";
?>
<div class="container" id="cont">
    <h1 class="text-white">Update/Delete articles</h1>
    <table class="table table-bordered">
<thead>
    <div class="loader">

    </div>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tittle</th>
      <th scope="col">Decription</th>
      <th scope="col">Photo</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody id="bod">
    <?php
        $articles = getArticlesById($_SESSION['idUser'], null);
        $br = 1;
        foreach($articles as $article){
            include "views/templates/articleRow.php";
            $br++;
        }
    ?>
    
</tbody>
</table>
<div class="row" id="suc">
    
</div>
</div>