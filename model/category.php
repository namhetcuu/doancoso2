<?php
class Category{
     public $category_id, $category_name;

     public function __construct($category_id,$category_name)
     {
          $this->category_id = $category_id;
          $this->category_name = $category_name;
     }
     public static function all(){
          $list = [];
          $db = Db::getInstance();
          $reg = $db->query("SELECT * FROM tbl_category");
          foreach($reg->fetchAll() as $category){
               $list[] = new Category($category['category_id'],$category['category_name']);
          }
          return $list;
     }
     public static function addcategory($category_name){
          $db = Db::getInstance();
          $sql = "INSERT INTO tbl_category(category_name) VALUES ('$category_name')";
          $db->exec($sql);
     }
     public static function delcategory($id){
          $db = Db::getInstance();
          $id = intval($id);
          $req = $db->prepare("DELETE FROM tbl_category WHERE category_id = :id");
          $req->execute(array('id' => $id));
     }
     public static function viewup($id) {
          $db = Db::getInstance();
          $id = intval($id);
          $req = $db->prepare("SELECT * FROM tbl_category WHERE category_id = :id");
          $req->execute(array('id' => $id));
          $category = $req->fetch();

          return new Category($category['category_id'], $category['category_name']);
     }
     public static function upcate($category_id,$category_name){
          $db = Db::getInstance();
          $category_id = intval($category_id);
          $sql = "UPDATE tbl_category SET category_name = '$category_name'
           WHERE category_id = '$category_id'";
           $db->exec($sql);

     }
}
?>