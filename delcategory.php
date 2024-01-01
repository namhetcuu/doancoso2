<?php
require_once 'connection.php';
$db = Db::getInstance();
$category_id = $_POST['category_id'];
if($category_id != ''){
     $req = $db->prepare("DELETE FROM tbl_category WHERE (:category_id)");
     $req->execute(array('category_id'=>$category_id));
     echo "insert into successfully";
}else{
     echo "Please fill in the blank";
}


?>