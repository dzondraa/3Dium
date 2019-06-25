<?php
    include "views/static/head.php";
    if(isset($_GET['page']) && isset($_SESSION['user'])){
        switch($_GET['page']){
            case "users" : include "views/pages/user.php"; break;
            case "addNew" : include "views/pages/addNew.php"; break;
            case "update" : include "views/pages/update.php"; break;
            case "singleArticle" : include "views/pages/singleArticle.php"; break;
        }
    }
    else{
        include "views/pages/login.php";
    }

    include "views/static/footer.php";

?>
