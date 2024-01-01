<?php
class OrderController{
     public function index(){
          if(isset($_SESSION['username'])){
               $orders = Order::all();
               require_once 'view/order/index.php';
          }else{
               require_once 'view/pages/login.php';
          }
          
     }
     public function detailOrder(){
          if(isset($_GET['id']))   $id = $_GET['id'];

          $detailsOrder = Order::detailOrder($id);
          require_once 'view/order/viewdetail.php';
     }
     public function uporder(){
          if(isset($_POST['capnhatdonhang'])){
               $order_code = $_POST['order_code'];
               $tinhtrang = $_POST['tinhtrang'];
               $uporder = Order::uporder($order_code,$tinhtrang);
               header("location: ?controller=order&action=index");
          }
     }
     public function delorder(){
          if(isset($_GET['id'])){
               $id = $_GET['id'];
               $delOrder = Order::delOrder($id);
               header("location: ?controller=order&action=index");
          }
     }
}

?>