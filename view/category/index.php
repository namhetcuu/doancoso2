
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<!-- <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
	<link rel="stylesheet" href="theme/css/styles.css">
	<!-- <link rel="stylesheet" href="theme/css/style.css"> -->
	<link rel="stylesheet" href="theme/css/stylee.css">
</head>
<body>
	
<div class="container" style="max-width: 100%;">
    <section class="main">
      <div class="main-top">
        <h1>Top 2 Nearest Category</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <?php
        $db = Db::getInstance();
        $sql = $db->query("SELECT * FROM tbl_category ORDER BY category_id DESC LIMIT 2");
        foreach($sql->fetchAll() as $category){?>
          <div class="card">
            <img src="theme/images/product-5.jpg">
            <h4><?= $category['category_name']?></h4>
            <div class="per">
              <table>
                <tr>
                  <td><span>Good</span></td>
                  <td><span>87%</span></td>
                </tr>
                <tr>
                  <td>Quantity</td>
                  <td>Review</td>
                </tr>
              </table>
            </div>
            <button>Profile</button>
          </div>
        <?php }
        ?>
        
          <div class="card">
               <img src="../view/images/">
               <h4 style="margin: auto;">ADD Category</h4>
               <div class="per">
                    <table>
                         <tr>
                              <form action="" method="post" id="add_form">
                              <td style="padding-right: 0px"> 
                              <input type="text" name="category_name" id="category_name" style="
                                   width: 100%;
                                   border-radius: 20px;
                                   font-size: 1rem"></td>
                         </tr>
                         <tr>
                              <td>Name Product</td>
                         </tr>
                         <tr>
                          <td id="show_alert"></td>
                          <td id="show_alert"></td>
                         </tr>
                    </table>
               </div>
               <input id="add_btn" type="submit" style="color: black; cursor: pointer; width: 100%; margin-top: 0px" value="ADD" name="themdanhmuc"></input>
               </form>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
          </div>
	</div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Attendance List</h1>
          <input type="text" name="" value="" class="form-control" id="live_search">

          <div id="searchresult">
          
          <table class="table">
              <thead>
                <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Delete</th>
                      <th>Edit</th>
                </tr>
              </thead>
              <tbody id="show">
                
                  <?php
                  $i=0;
                  foreach($categorys as $category){?>
                  <tr id="<?php echo $category->category_id ?>">
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $category->category_name; ?></td>
                        <td>
                          <a href="?controller=category&action=delcate&id=<?php echo $category->category_id ?>">Delete</a>
                        </td>
                        <td>
                      <a href="?controller=category&action=viewup&id=<?php echo $category->category_id ;?>">Edit</a>
                        </td>
                        
                  </tr>
                        
                  <?php }
                  ?>
                  
              </tbody>
            </table>

          </div>
          
        </div>
      </section>
    </section>
  </div>
</body>
</html>
<script>
            $(document).ready(function(){
                $('#add_form').submit(function(e){
                    e.preventDefault();
                    $('#add_btn').val('Adding...');


                    $.ajax({
                        url: 'addcategory.php',
                        method: 'post',
                        data: $(this).serialize(),
                        success:function(response){
                            console.log(response);
                            $('#show').append(`
                            <tr>
                              <td><?= $i++ ?></td>
                              <td>`+$('#category_name').val()+`</td>
                              <td><a href="?controller=category&action=delcate&id=">Delete</a></td>
            
                              <td><a href="?controller=category&action=viewup&id=">Edit</a></td>
                            </tr>
                            `)
                            $('#add_btn').val('Add');
                            $('#add_form')[0].reset();
                            $('#show_alert').html(`<div class="alert alert-primary" role="alert">${response}</div>`)
                        }
                    })
                })
                $("#live_search").keyup(function(){
                  var input = $(this).val();
                  
                  if(input != ""){
                    $.ajax({
                      url: "searchcate.php",
                      method: "POST",
                      data: {input: input},
                      success:function(data){
                        $("#searchresult").html(data);
                      }
                    })
                  }else{
                    $("#searchresult").html(`
                    <table class="table">
                      <thead>
                        <tr>
                              <th>STT</th>
                              <th>Name</th>
                              <th>Delete</th>
                              <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody id="show">
                        
                          <?php
                          $i=0;
                          foreach($categorys as $category){?>
                          <tr id="<?php echo $category->category_id ?>">
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $category->category_name; ?></td>
                                <td>
                                  <a href="?controller=category&action=delcate&id=<?php echo $category->category_id ?>">Delete</a>
                                </td>
                                <td>
                              <a href="?controller=category&action=viewup&id=<?php echo $category->category_id ;?>">Edit</a>
                                </td>
                                
                          </tr>
                                
                          <?php }
                          ?>
                          
                      </tbody>
                    </table>
                    `)
                  }
                })
            })
    </script>
