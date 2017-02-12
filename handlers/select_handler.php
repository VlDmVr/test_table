<?php
include '../classes/Db.php';

if($_POST['id']){
    
    $id = $_POST['id'];
    
   $result = Db::selectOneData($id); 
  
   if($result){
    foreach($result as $key=>$value){

        $exit_arr[$key] = $value;
    }

    echo $exit_arr = json_encode($exit_arr);
   }
}

