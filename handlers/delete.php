<?php
include '../classes/Db.php';

if(!empty($_GET['id'])){
    
    $id = $_GET['id'];
 
    $result = Db::deleteData($id);
 
    if($result){
        header("Location: http://test/index.php");
    }
}

