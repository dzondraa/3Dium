<?php
    include "views/static/header.php";
    include "models/articles/functions.php";
    if(isset($_GET['id'])){
      $article = getArticleByIdArt($_GET['id']);
    }
?>
<div class="container" id="cont">

<h1 class="text-white text-center">
  <?php
    if(isset($_GET['id'])){
      echo "<h1 class='text-white text-center'>Update article</h1>";
    }
    else{
      echo "<h1 class='text-white text-center'>Add article</h1>";
    }
  ?>
</h1>
    <form id="formaAdd" method="post"
    action="<?php  if(isset($_GET['id'])){
      echo "models/articles/update.php";
    }
    else{
      echo "models/articles/add.php";
    } ?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="text" class="form-control" id="heading" name="heading" placeholder="Heading"
    <?php 
    if(isset($_GET['id'])){
      echo "value='$article->heading'";
    }
    ?>
    >
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" id="description" placeholder="Description here..." rows="3"><?php
       if(isset($_GET['id'])){
        echo $article->text;
      }
      ?></textarea>
  </div>
  <?php if(!isset($_GET['id'])): ?>
  <label for="file">Photo:</label><br>
  <input type="file" name="file" id="file" >
    <?php endif; ?>
  <div id="mainErr"></div>
  <?php if(isset($_GET['id'])): ?>
  <button type="button" id="btnZaSliku" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">
  UPLOAD IMAGES
</button>
    <?php endif; ?>
<br>
  <input type="submit" id="create" class="btn btn-primary btn-lg btn-block" value="create">
</form>



</div>
<!-- MODAL -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload images for this article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="uploaded" class="col-lg-12 d-flex justify-content-around flex-wrap">
            <?php
            $photos = getAllPhotos($_GET['id']);
            foreach($photos as $photo):
            ?>
              <div class="card" style="width: 10rem;">
                <img class="card-img-top" src="<?= $photo->big ?>" alt="Article photo">
                <div class="card-body">
                  <a href="#" data-id="<?= $photo->idImg?>" class="btn btn-primary">Delete</a>
                </div>
              </div>

            <?php endforeach; ?>
              <div class="col-lg-12" id="errors"></div>
          </div>
        <form id="form" method="post" action="models/articles/uploadImg.php" enctype="multipart/form-data">
        
        <input type="file" name="file[]" multiple>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="UPLOAD">
        
        </form>
        
        
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>     
<!-- END MODAL -->  