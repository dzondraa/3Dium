<?php
header("Content-Type:application/json");
@session_start();
include "functions.php";
require_once "../../config/connection.php";
    $file = $_FILES['file'];
    $len = count($file["name"]);
    for($i=0 ; $i < $len; $i++){
        
        $name = $file['name'][$i];
        $type = $file['type'][$i];
        $size = $file['size'][$i];
        $tmpName = $file['tmp_name'][$i];
        
        $naziv = time().$name;
        $putanjaOriginalnaSlika = 'assets/images/articles/'.$naziv;
        if(move_uploaded_file($tmpName, '../../'.$putanjaOriginalnaSlika)){

            try {
                
                insertImages($putanjaOriginalnaSlika , $_POST['id']);
                       
            } catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        

   
    }
    http_response_code(200);
    echo json_encode(getAllPhotos($_POST['id']));
    
    
?>