<?php
session_start();
include "../../config/connection.php";
include "functions.php";
if(isset($_POST['id'])){
    header("Content-Type:application/json");
    if($_POST['id'] > 0){
    $articles = getArticlesById((int)$_POST['id'] , null);
    }
    else{
        $articles = getAllArticles(null);
    }
    $len = count($articles);
    echo json_encode(array("len" => $len));
    http_response_code(200);
    
    
}
?>