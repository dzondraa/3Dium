<tr>
       <td><?= $br ?></td>
       <td><?=$article->heading?></td>
       <td><?=$article->text?></td>
       <td><img src="<?=$article->big?>" alt="<?=$article->heading?>"></td>
       <td><a class='btn btn-info' href='index.php?page=addNew&id=<?=$article->idArticle?>' data-id="<?=$article->idArticle?>" role='button'>Update</a></td>
       <td><a class='btn btn-danger brisanjeAdmin' href='#' data-id="<?=$article->idArticle?>" role='button'>Remove</a></td>
     </tr>