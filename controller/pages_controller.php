<?php

class PagesController{
     // public function home(){
     //      $first_name = "nam";
     //      $age = "20";
     //      require_once './view/pages/home.php';
     // }
     // public function error(){
     //      require_once './view/pages/error.php';
     // }
     public function dashboard(){
          if(isset($_SESSION['username'])){
               require_once 'view/pages/dashboard.php';
          }else{
               require_once 'view/pages/login.php';
          }
          
     }
     public function viewlogin() {
          require_once 'view/pages/login.php';
     }
     public function logout(){
          $name_session = $_SESSION['username'];
          $logout = Pages::logout($name_session);
          if($logout){
               //require_once 'view/pages/login.php';
                header("location: ?controller=pages&action=login");
                exit();
          } 
     }
     public function login(){
          if(isset($_POST['login'])&&($_POST['login'])){
               $username = $_POST['username'];
               $password = $_POST['password'];
               $login = Pages::getAccount($username, $password);
               if($login){
                    echo "ok";  
                    // require_once 'view/pages/dashboard.php';
                     header("location: ?controller=pages&action=dashboard");
                    exit();
                }else{
                    echo "<script>alert('Information error!!')</script>";
                    require_once 'view/pages/login.php';
                    
                }
          }else{
               require_once 'view/pages/login.php';
          }
          
           
          
     }
}
?>