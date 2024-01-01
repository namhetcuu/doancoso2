<?php
class Customer{
     public $client_id,$client_name,$client_phone,$client_address,
     $client_email,$client_password,$client_note,$name_card,
     $number_card,$time_card,$year_card,$number_cvv;
     public function __construct($client_id,$client_name,$client_phone,$client_address,
     $client_email,$client_password,$client_note,$name_card,
     $number_card,$time_card,$year_card,$number_cvv)
     {
          $this->client_id=$client_id;
          $this->client_name=$client_name;
          $this->client_phone=$client_phone;
          $this->client_address=$client_address;
          $this->client_email=$client_email;
          $this->client_password=$client_password;
          $this->client_note=$client_note;
          $this->name_card=$name_card;
          $this->number_card=$number_card;
          $this->time_card=$time_card;
          $this->year_card=$year_card;
          $this->number_cvv=$number_cvv;
          
     }
     public static function all(){
          $list = [];
          $db = Db::getInstance();

          $reg = $db->query("SELECT * FROM tbl_client");
          foreach($reg->fetchAll() as $client){
               $list[] = new Customer($client['client_id'],$client['client_name'],
               $client['client_phone'],$client['client_address'],$client['client_email'],
               $client['client_password'],$client['client_note'],$client['name_card'],
               $client['number_card'],$client['time_card'],$client['year_card'],$client['number_cvv']);
          }
          return $list;
     }
}
?>