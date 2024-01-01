<?php
require_once 'connection.php';
$db = Db::getInstance();
$category_name = $_POST['category_name'];
if($category_name != ''){
     $req = $db->prepare("INSERT INTO tbl_category(category_name) VALUES (:category)");
     $req->execute(array('category'=>$category_name));
     echo "insert into successfully";
}else{
     echo "Please fill in the blank";
}


?>