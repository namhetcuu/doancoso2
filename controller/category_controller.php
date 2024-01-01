<?php
  class CategoryController {
    public function index() {
      if(isset($_SESSION['username'])){
        $categorys = Category::all();
        require_once('view/category/index.php');
      }else{
        require_once('view/pages/login.php');
      }
      // we store all the posts in a variable
       
    }
    public function addcate() {
      // we store all the posts in a variable
      if(isset($_POST['themdanhmuc'])){
        $category_name = $_POST['category_name'];
        $addcategory = Category::addcategory($category_name);
        header("location: ?controller=category&action=index");
      }
    }
    public function delcate(){
      if(isset($_GET['id']))  $id = $_GET['id'];
      $delcate = Category::delcategory($id);
      header("location: ?controller=category&action=index");
    }

    public function viewup() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (isset($_GET['id'])) $id = $_GET['id'];

      // we use the given id to get the right post
      $category = Category::viewup($id);
      require_once('view/category/upcategory.php');
    }
    public function upcategory() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if(isset($_POST['suadanhmuc'])){
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        // we use the given id to get the right post
        $category = Category::upcate($category_id, $category_name);
        header("location: ?controller=category&action=index");
      }
      
    }
  }
?>