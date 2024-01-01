<?php
require_once 'connection.php';
$db = Db::getInstance();
if(isset($_POST['input'])){?>
     
     <table class="table">
          <thead>
            <tr>
               <th>STT</th>
               <th>Name</th>
               <th>Image</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Category</th>
               <th>Delete</th>
               <th>Edit</th>
            </tr>
          </thead>
          <tbody>
               <?php
                    $input = $_POST['input'];
               $req = $db->query("SELECT * FROM tbl_product,tbl_category WHERE product_name LIKE '{$input}%'
               AND tbl_product.category_id=tbl_category.category_id");
               
               $i=0;
               foreach($req->fetchAll() as $product){?>
              <tr id="<?php echo $product['product_id'] ?>">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><img src="theme/images/<?php echo $product['product_image']; ?>" style="width: 100px; height: 100px" alt=""></td>
                    <td><?php echo $product['product_price']; ?></td>
                    <td><?php echo $product['product_quantity']; ?></td>
                    <td><?php echo $product['category_name']; ?></td>
                    <td>
                    <a href="?controller=product&action=delproduct&id=<?php echo $product['product_id'] ?>">Delete</a></td>
                    <td><a href="?controller=product&action=viewup&id=<?php echo $product['product_id'] ;?>">Edit</a></td>
                         
              </tr>
                    
              <?php }
              ?>
              
          </tbody>
        </table>
     <?php 
     }else{
          echo "<h6 class = 'text-danger text-center mt-3 '>No data Found!</h6>";
     }
     

?>