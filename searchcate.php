<?php
require_once 'connection.php';
$db = Db::getInstance();
if(isset($_POST['input'])){?>
     
     <table class="table">
          <thead>
            <tr>
                  <th>STT</th>
                  <th>Name</th>
                  <th>Delete</th>
                  <th>Edit</th>
            </tr>
          </thead>
          <tbody>
               <?php
                    $input = $_POST['input'];
               $req = $db->query("SELECT * FROM tbl_category WHERE category_name LIKE '{$input}%'");
               
               $i=0;
               foreach($req->fetchAll() as $category){?>
              <tr id="<?php echo $category['category_id'] ?>">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td>
                      <a href="?controller=category&action=delcate&id=<?php echo $category['category_id'] ?>">Delete</a>
                    </td>
                    <td>
                  <a href="?controller=category&action=viewup&id=<?php echo $category['category_id'] ;?>">Edit</a>
                    </td>
                    
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