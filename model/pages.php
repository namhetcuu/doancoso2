<?php
  class Pages {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password) {
      $this->id      = $id;
      $this->username  = $username;
      $this->password = $password;
    }
    public static function getAccount($username, $password){
          $db = Db::getInstance();
          $req = $db->query("SELECT * FROM tbl_admin WHERE 
          admin_name = '$username' AND admin_pass = '$password'");

          if($row = $req->fetch()){
              $_SESSION['username'] = $row['admin_name'];
               return true;
          }
    }
    public static function logout($name_session){
      session_destroy();
      return true;
    }

    
  }
?>