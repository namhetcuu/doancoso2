<?php
class Product{
     public $product_id ,$category_id ,$product_name ,
     $product_price ,$product_promotion, 
     $product_detail ,$product_outstan ,
     $product_quantity ,$product_image ,$product_describe,$category_name;
    public function __construct($product_id ,$category_id ,$product_name 
    ,$product_price ,$product_promotion, 
    $product_detail ,$product_outstan ,$product_quantity ,$product_image 
    ,$product_describe, $category_name)
    {
      $this->product_id = $product_id;
      $this->category_id = $category_id;
      $this->product_name = $product_name;
      $this->product_price = $product_price;
      $this->product_promotion = $product_promotion;
      $this->product_detail = $product_detail;
      $this->product_outstan = $product_outstan;
      $this->product_quantity = $product_quantity;
      $this->product_image = $product_image;
      $this->product_describe = $product_describe;
      $this->category_name = $category_name;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM tbl_product,tbl_category 
      WHERE tbl_product.category_id=tbl_category.category_id');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $product) {
        $list[] = new Product($product['product_id'], $product['category_id'], $product['product_name'],
        $product['product_price'], $product['product_promotion'], $product['product_detail'],
        $product['product_outstan'], $product['product_quantity'], $product['product_image'], $product['product_describe'], $product['category_name']);
      }

      return $list;
    }

    public static function viewup($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM tbl_product WHERE product_id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $product = $req->fetch();

      $sql = $db->prepare('SELECT * FROM tbl_category WHERE category_id = :id');
      $sql->execute(array('id' => $product['category_id']));
      $category = $sql->fetch();

      return new Product($product['product_id'] ,$product['category_id'] ,$product['product_name'] 
      ,$product['product_price'] ,$product['product_promotion'], 
      $product['product_detail'] ,$product['product_outstan'] ,$product['product_quantity'] 
      ,$product['product_image'] ,$product['product_describe'], $category['category_name']);
    }
    public static function delpro($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('DELETE FROM tbl_product WHERE product_id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));

    }

    public static function uppro($product_id,$product_name,$product_image,$product_image_tmp,$product_quantity,$product_price
    ,$product_outstan,$product_describe,$product_detail,$product_promotion,$category_id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $product_id = intval($product_id);

      if($product_image == ''){

        $sql = "UPDATE tbl_product SET category_id ='$category_id', product_name='$product_name',
        product_price='$product_price', product_quantity='$product_quantity'
        ,product_promotion='$product_promotion', product_detail='$product_detail'
        ,product_outstan='$product_outstan',product_describe='$product_describe' 
        WHERE product_id= '$product_id'";
        $db->exec($sql);

      }else{

        $sql = "UPDATE tbl_product SET category_id ='$category_id', product_name='$product_name',
        product_price='$product_price', product_quantity='$product_quantity'
        ,product_promotion='$product_promotion', product_detail='$product_detail'
        ,product_outstan='$product_outstan', product_image='$product_image'
        ,product_describe='$product_describe' WHERE product_id= '$product_id'";

        move_uploaded_file($product_image_tmp,'theme/images/'.$product_image);
        $db->exec($sql);
      }
      
      // the query was prepared, now we replace :id with our actual $id value
      //$req->execute(array('id' => $id));

      

    }
    public static function addsp($product_name,$product_image,$product_image_tmp,$product_quantity,$product_price
    ,$product_outstan,$product_describe,$product_detail,$product_promotion,$category_id){

      // $productquantity = intval($product_quantity);
      // $productprice = intval($product_price);
      // $productoutstan = intval($product_outstan);
      // $productpromotion = intval($product_promotion);

      $db = Db::getInstance();
      // $reg = $db->prepare("INSERT INTO tbl_product(category_id,product_name,product_price
      // ,product_promotion,product_detail,product_outstan,product_quantity,product_image,product_describe) 
      // VALUES (?,?,?,?,?,?,?,?)");

      // $reg->execute(array(':category_id'=> $category_id,'product_name'=>$product_name,
      // 'product_price'=>$productprice
      // ,'product_promotion'=>$productpromotion,'product_detail'=>$product_detail,
      // 'product_outstan'=>$productoutstan,
      // 'product_quantity'=>$productquantity,'product_image'=>$product_image,'product_describe'=>$product_describe));
      // $sql = "INSERT INTO tbl_product(category_id,product_name,product_price
      // ,product_promotion,product_detail,product_outstan,product_quantity,product_image) 
      // VALUES (1,'$tensanpham','$gia',0,'$chitiet','$giakhuyenmai','$soluong','$image')";
      // $reg = $db->prepare("INSERT INTO tbl_product(category_id,product_name,product_price
      // ,product_promotion,product_detail,product_outstan,product_quantity,product_image) VALUES
      // (1,'$tensanpham','$gia',0,'$chitiet','$giakhuyenmai','$soluong','$image')");
      //move_uploaded_file($image_tmp,'theme/images/'.$image);
      //'$product_name','$product_image','$product_quantity',$product_price'
     // ,'$product_outstan','$product_describe','$product_detail,'$product_promotion','$category_id'
      // $stmt = $db->prepare("INSERT INTO tbl_product(category_id,product_name,product_price
      // ,product_promotion,product_detail,product_outstan,product_quantity,product_image) 
      // VALUES (?,?,?,?,?,?,?,?)"); 
      // $stmt->bindParam("sss",$product_name,$product_image,$product_quantity,$product_price
      // ,$product_outstan,$product_describe,$product_detail,$product_promotion,$category_id);
      // return $stmt->execute();
      // $stmt = $db->prepare("INSERT INTO tbl_product(category_id,product_name,product_price
      // ,product_promotion,product_detail,product_outstan,product_quantity,product_image) 
      // VALUES (:category_id,:product_name,:product_price
      // ,:product_promotion,:product_detail,:product_outstan,:product_quantity,:product_image)"); 
      // $stmt->bindParam(':category_id',$category_id);
      // $stmt->bindParam(':product_name',$product_name);
      // $stmt->bindParam(':product_price',$category_id);
      // $stmt->bindParam(':product_promotion',$product_promotion);
      // $stmt->bindParam(':product_detail',$product_detail);
      // $stmt->bindParam(':product_outstan',$product_outstan);
      // $stmt->bindParam(':product_quantity',$product_quantity);
      // $stmt->bindParam(':product_image',$product_image);

      $sql = "INSERT INTO tbl_product(category_id,product_name,product_price,product_quantity
       ,product_promotion,product_detail,product_outstan,product_image,product_describe) 
       VALUES ('$category_id','$product_name','$product_price','$product_quantity',
       '$product_promotion','$product_detail','$product_outstan','$product_image','$product_describe')";

      move_uploaded_file($product_image_tmp,'theme/images/'.$product_image);
       $db->exec($sql);
    }
  }

?>