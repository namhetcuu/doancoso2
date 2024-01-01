<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $post_id,$post_title,$post_image	
    ,$post_time,$post_author,$post_summary,$post_describe;	


    public function __construct($post_id,$post_title,$post_image	
    ,$post_time,$post_author,$post_summary,$post_describe) {
      $this->post_id = $post_id;
      $this->post_title  = $post_title;
      $this->post_image = $post_image;
      $this->post_time = $post_time;
      $this->post_author = $post_author;
      $this->post_summary = $post_summary;
      $this->post_describe = $post_describe;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM tbl_post');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['post_id'], $post['post_title'], $post['post_image'],
        $post['post_time'], $post['post_author'], $post['post_summary'],$post['post_describe']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      // return new Post($post['id'], $post['author'], $post['content']);
    }
  }
?>