<?php
include '../classes/Db.php';

//без валидации данных
if($_POST['add_sbmt']){
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $cat_id = $_POST['name_cat'];
    
    $result = Db::saveData($name, $price, $description, $status, $cat_id);
    
    if($result){
        header("Location: http://test/index.php");
    }
}

