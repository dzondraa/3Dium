<?php
 
    function getUserByUsernameAndPassword($username , $password){
        global $conn;
        $query = "SELECT * FROM users WHERE username = ? and password = ?";
        $query = $conn->prepare($query);
        try{
            $rez = $query->execute([$username , $password]);
            if($rez){
                $user = $query->fetchAll();
                if(count($user)){
                    return $user[0];
                }
                else{
                    return null;
                }
            }
        }
        catch(PDOException $ex){
             $ex->getMessage();
        }
    }
    function getUsers(){
        global $conn;
        $query = "SELECT * FROM users";
        $query = $conn->prepare($query);
        try{
            $rez = $query->execute();
            if($rez){
                $user = $query->fetchAll();
                if(count($user)){
                    return $user;
                }
                else{
                    return null;
                }
            }
        }
        catch(PDOException $ex){
             $ex->getMessage();
        }
    }


?>