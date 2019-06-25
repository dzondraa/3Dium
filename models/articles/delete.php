<?php
session_start();
include "../../config/connection.php";
include "functions.php";
if(isset($_POST['id'])){
    header("Content-Type:application/json");
    if($_POST['id'] > 0){
    $quer = "DELETE FROM images where idArticle = ?";
    $quer1 = "DELETE FROM articles where idArticle = ?";
    try{
        $quer = $conn->prepare($quer);
        $quer1 = $conn->prepare($quer1);
        $conn->beginTransaction();
        $quer->execute([$_POST['id']]);
        $quer1->execute([$_POST['id']]);
        $r = $conn->commit();
        if($r){
            echo json_encode(getArticlesById($_SESSION['idUser'] , null)); 
        }
    }
    catch(PDOException $ex){
        $conn->rollBack();
        echo $ex->getMessage();
    }
    }
    else{
        echo json_encode(array("message" => "Bad id!"));
    }
   
    http_response_code(200);
    
    
}
?>