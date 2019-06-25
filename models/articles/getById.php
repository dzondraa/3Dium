<?php
session_start();
include "../../config/connection.php";
include "functions.php";
if(isset($_POST['id'])){
    header("Content-Type:application/json");
    if($_POST['id'] > 0){
    $articles = getArticlesById((int)$_POST['id'] , (int)$_POST['limit']);
    }
    else{
        $articles = getAllArticles($_POST['limit']);
    }
    echo json_encode($articles);
    http_response_code(200);
    
    
}
?>