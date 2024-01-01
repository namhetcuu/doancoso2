<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<link href="theme/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
     <div class="col-md-10" style="margin-top: 3rem;">
          <h4>Update Product</h4>
          
          <form action="?controller=category&action=upcategory" method="POST" enctype="multipart/form-data">
               <label>Product Name</label><br>
               <input type="text" class="form-control" name="category_name" value="<?= $category->category_name ?>" placeholder=""><br>
               <input type="hidden" class="form-control" name="category_id" value="<?= $category->category_id ?>" placeholder=""><br>
               
               <!-- <select name="category_id" id="" class="form-control">
                    <?php
                    $category_id = $category->category_id;
                    $db = Db::getInstance();
                    $req = $db->query("SELECT * FROM tbl_category");
                    foreach($req->fetchAll() as $category){
                         if($category_id == $category['category_id']){?>
                              <option selected value="<?= $category['category_id'] ?>" >
                              <?= $category['category_name'] ?>
                              </option>
                         <?php }else{?>
                              <option value="<?= $category['category_id'] ?>" >
                              <?= $category['category_name'] ?>
                              </option>
                         <?php }
                    }

                    ?>
               </select><br> -->
               <!-- <input type="hidden" class="form-control" value="<?= $category->category_id ?>" name="" placeholder=""><br> -->
               <!-- <input type="text" class="form-control" value="<?= $product->product_id ?>" name="category_id" placeholder=""><br> -->

               <input type="submit" name="suadanhmuc" value="Update Category" class="btn btn-outline-success">
               <a href="?controller=category&action=index" class="btn btn-outline-primary">Back View</a>
               
          </form>