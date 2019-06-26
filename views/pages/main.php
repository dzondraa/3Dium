<?php
@session_start();
    if(isset($_SESSION['user'])){
        
    }
    else{
        include "views/pages/login.php";
    }
?>