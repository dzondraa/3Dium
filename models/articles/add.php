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
    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $size = $file['size'];
    $type = $file['type'];
    $naziv = time().$name;
    $putanjaOriginalnaSlika = 'assets/images/articles/'.$naziv;
    $ins = "INSERT INTO articles values(null , ? , ? , ?)";
    try {
    $ins = $conn->prepare($ins);
    $ins->execute([$heading , $desc , $_SESSION['idUser']]);
    if(move_uploaded_file($tmp, '../../'.$putanjaOriginalnaSlika)){
        
            $success = insertImages($putanjaOriginalnaSlika ,$conn->lastInsertId());
            if($success){
                $code = 200;
                $data = "Successful!";
            }          
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
