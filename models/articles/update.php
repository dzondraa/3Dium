<?php
    session_start();
    include "../../config/connection.php";
    include "functions.php";
    header("Content-Type:application/json");
    $code = 404;
    $data = "Page not found!";
    if(isset($_POST['heading']) && isset($_POST['description'])){
    $heading = $_POST['heading'];
    $desc = $_POST['description'];
    $idArticle = $_POST['id'];
    $upd = "UPDATE  articles set heading = ? , text = ? where idArticle = ?";
    try {
    $upd = $conn->prepare($upd);
    $upd->execute([$heading , $desc , $idArticle]);
    if($upd){
                $code = 200;
                $data = "updated";         
        }
        else{
            $code = 406;
        }
     } catch(PDOException $ex){
            echo $ex->getMessage();
            $code = 500;
            $data = "Database error!";
        }
    }
    http_response_code($code);
    echo json_encode($data);
?>
