<?php
class CustomerController{
     public $client_id,$client_name,$client_phone,$client_address,
     $client_email,$client_password,$client_note,$name_card,
     $number_card,$time_card,$year_card,$number_cv;
     public function index(){
          if(isset($_SESSION['username'])){
               $customers = Customer::all();
               require_once ('view/customer/index.php');
          }else{
               require_once 'view/pages/login.php';
          }
          
     }
}
?>