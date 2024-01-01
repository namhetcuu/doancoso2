<?php
session_start();
require_once 'connection.php';
if(!isset($_SESSION['username'])){
     $controller = 'pages';
     $action = 'login';
}
// }else{
//      require_once 'view/pages/dashboard.php';
// }
if(isset($_GET['controller']))     $controller = $_GET['controller'];
     
// }else{
//      $controller = 'pages';
// }
if(isset($_GET['action']))    $action = $_GET['action'];
//else $action = 'dashboard';

require_once './view/layout.php';
?>