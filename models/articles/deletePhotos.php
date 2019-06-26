<?php
session_start();
include "../../config/connection.php";
include "functions.php";
if(isset($_POST['id'])){
    $photo = getSinglePhoto($_POST['id']);
    $mess = "Failed";
    header("Content-Type:application/json");
    if(unlink("../../".$photo)){
    
    try{
    $succ = deletePhoto($_POST['id']);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }
    if($succ){
        $mess = "Successful deleted!";
        
        $photos = getAllPhotos($_SESSION['idArticle']);
        echo json_encode($photos);
        

    }
    else{
        $mess = "Delete failed!";
        echo json_encode(array("message" => $mess));
    }
    }
    
    http_response_code(200);
    
    
}
?>