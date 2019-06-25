<?php
    function insertImages($big , $artic){
        global $conn;
        try{
        $query = "INSERT into images values(null , ? , ?)";
        $query = $conn->prepare($query);
        $a = $query->execute([$big , $artic]);
        if($a){
            return true;
        }
        else{
            return false;
        }
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
    function getAllPhotos($id){
        global $conn;
        try{
        $query = "SELECT * FROM images where idArticle = ?";
        $query = $conn->prepare($query);
        $query->execute([$id]);
        $photos = $query->fetchAll();
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return $photos;
    }
    function getFirstPhoto($id){
        global $conn;
        try{
        $query = "SELECT * FROM images where idArticle = ? limit 1";
        $query = $conn->prepare($query);
        $query->execute([$id]);
        $photos = $query->fetch();
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }
        return $photos->big;
    }
    function getAllArticles($limit){
        global $conn;
        if($limit == null){
        $upit = "SELECT * FROM articles";
        }
        else{
        $limit1 = ($limit-1) * 3;
        $upit = "SELECT * FROM articles LIMIT ? , 3";
        }
        try{    
            $upit = $conn->prepare($upit);
            if($limit !== null){
            $upit->bindValue(1, $limit1, PDO::PARAM_INT);
            }
            $upit->execute();
            $up = $upit->fetchAll();
            foreach($up as $u){
                $u->big = getFirstPhoto($u->idArticle);
            }
            return $up;
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
    function getArticlesById($id , $limit){
        global $conn;
        $upit = "SELECT * FROM articles where idUser = ?";
        if($limit != null){
            $limit1 = ($limit - 1) * 3;
            $upit .= " LIMIT ? , 3";
        }
        try{    
            $upit = $conn->prepare($upit);
            $upit->bindValue(1 , $id);
            if($limit != null){
                $upit ->bindValue(2 , $limit1 , PDO::PARAM_INT);
            }
            $upit->execute();
            $art = $upit->fetchAll();
            foreach($art as $a){
                $a->big = getFirstPhoto($a->idArticle);
            }
            return $art;
        }
        catch(PDOException $ex){
            $ex->getMessage();
            
            
        }
    }
    function getArticleByIdArt($id){
        global $conn;
        $upit = "SELECT * FROM articles where idArticle = ?";
        try{    
            $upit = $conn->prepare($upit);
            $upit->execute([$id]);
            $art = $upit->fetchAll();
            return $art[0];
        }
        catch(PDOException $ex){
            $ex->getMessage();
            
            
        }
    }

?>