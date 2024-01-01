<?php
class Order{
     public $order_id,$product_id,$order_quantity,
     $order_code,$client_id,$order_time,$order_status, $product_name,
     $client_name, $product_price,$product_quantity;
     public function __construct($order_id,$product_id,$order_quantity,
     $order_code,$client_id,$order_time,$order_status,$product_name,$client_name, $product_price,$product_quantity)
     {
          
          $this->order_id = $order_id;
          $this->product_id = $product_id;
          $this->order_quantity = $order_quantity;
          $this->order_code = $order_code;
          $this->client_id = $client_id;
          $this->order_time = $order_time;
          $this->order_status = $order_status;
          $this->product_name = $product_name;
          $this->client_name = $client_name;
          $this->product_price = $product_price;
          $this->product_quantity = $product_quantity;
     }
     public static function all(){
          $list = [];
          $db = Db::getInstance();
          $reg = $db->query("SELECT * FROM tbl_product,tbl_client,tbl_order 
          WHERE tbl_order.product_id=tbl_product.product_id AND 
          tbl_order.client_id=tbl_client.client_id 
          GROUP BY order_code");
          $orders = $reg->fetchAll();

          // $req_product = $db->prepare("SELECT * FROM product WHERE product_id = :id");
          // $req_product->execute(array('id' => $orders));
          // $product = $req_product->fetch();

          foreach($orders as $order){
               $list[] = new Order($order['order_id'],$order['product_id'],$order['order_quantity'],
               $order['order_code'],$order['client_id'],$order['order_time'],$order['order_status'], 
          $order['product_name'],$order['client_name'],$order['product_price'],$order['product_quantity']);
          }
          return $list;
     }
     public static function uporder($id,$tinhtrang){
          $db = Db::getInstance();
          $sql = "UPDATE tbl_order SET order_status='$tinhtrang' WHERE order_code = $id";
          $db->exec($sql);

     }
     public static function delOrder($id){
          $db = Db::getInstance();
          $id = intval($id);
          $req = $db->prepare('DELETE FROM tbl_order WHERE order_code = :id');
          // the query was prepared, now we replace :id with our actual $id value
          $req->execute(array('id' => $id));

     }
     public static function detailOrder($id){
          $list = [];
          $db = Db::getInstance();
          $id = intval($id);
          //$id_order = (string)$id;
          // $reg = $db->query("SELECT * FROM tbl_order,tbl_product 
          // WHERE tbl_order.product_id=tbl_product.product_id AND tbl_order.order_code='$id_order'");
          // $orders = $reg->fetchAll();

          $req = $db->prepare("SELECT * FROM tbl_order,tbl_product,tbl_client
          WHERE tbl_order.product_id=tbl_product.product_id
           AND tbl_order.client_id = tbl_client.client_id AND tbl_order.order_code= :id");
          $req->execute(array('id' => $id));
          $orders = $req->fetchAll();

          // $req = $db->query("SELECT * FROM tbl_order,tbl_product,tbl_client WHERE 
          // tbl_order.product_id = tbl_product.product_id AND 
          // tbl_client.client_id = tbl_order.client_id AND tbl_order.order_code = $id");
          // // $req->execute(array('id' => $id_order));
          // $orders = $req->fetch();


          // return new Order($order['order_id'],$order['product_id'],$order['order_quantity'],
          // $order['order_code'],$order['client_id'],$order['order_time'],$order['order_status'], 
          // $order['product_name'],$client['client_name']);

          foreach($orders as $order){
               $list[] = new Order($order['order_id'],$order['product_id'],$order['order_quantity'],
               $order['order_code'],$order['client_id'],$order['order_time'],$order['order_status'], 
               $order['product_name'],$order['client_name'], $order['product_price'], $order['product_quantity']);
          }
          return $list;
          // return new Order($order['order_id'],$order['product_id'],$order['order_quantity'],
          //  $order['order_code'],$order['client_id'],$order['order_time'],$order['order_status'], 
          //  $order['product_name'],$client['client_name'], $order['product_price'], $order['product_quantity']);
     }

}
?>