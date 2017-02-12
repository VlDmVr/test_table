<?php
include '../classes/Db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$status = $_POST['status'];
$description = $_POST['description'];
$cat_id = $_POST['cat_id'];

if($id && $name && $price && $status && $description && $cat_id){
    
   $result = Db::updateData($id, $name, $price, $status, $description, $cat_id);
    
    if($result){
        
        $arr = Db::selectOneData($id);
        
        foreach($arr as $key=>$value){

            $exit_arr[$key] = $value;
        }
        
        echo $exit_arr = json_encode($exit_arr);
    }
}