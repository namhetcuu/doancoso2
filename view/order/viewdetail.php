
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
	
<div class="container"style="max-width: 100%;">
    <section class="main">
    <div class="main-top">
        <h1>Top 2 Nearest Order</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <?php
        $db = Db::getInstance();
        $sql = $db->query("SELECT * FROM tbl_product,tbl_client,tbl_order 
        WHERE tbl_order.product_id=tbl_product.product_id AND 
        tbl_order.client_id=tbl_client.client_id ORDER BY order_id DESC LIMIT 2");
        foreach($sql->fetchAll() as $order){?>
          <div class="card">
            <img src="theme/images/icons/author.jpg">
            <h4><?= $order['client_name']?></h4> 
            <p><?= $order['order_quantity']?></p>
            <div class="per">
              <table>
                <tr>
                  <td><span><?= $order['order_status']?></span></td>
                  <td><span><?= $order['order_code']?></span></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>Code</td>
                </tr>
              </table>
            </div>
            <!-- <button>Profile</button> -->
          </div>
        <?php }
        ?> 
	  </div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Attendance List</h1>
          <form action="?controller=order&action=uporder" method="post">
          <table class="table">
            <thead>
              <tr>
				<!-- <th>STT</th>
				<th>Name</th>
				<th>Image</th>
				<th>Quantity</th>
				<th>Catalog</th>
				<th>Price</th>
				<th>Promotional Price</th>
				<th>Manage</th> -->
                    <th>STT</th>
                    <!-- <th>Name Product</th> -->
                    <!-- <th>Quantity</th> -->
                    <th>Code Product</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Manage</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                foreach($detailsOrder as $detail){?>
                    
                    <tr>
                         <td><?php echo $i++ ?></td>
                         <td><?php echo $detail->order_code; ?></td>
                         <td><?php echo $detail->product_name; ?></td>
                         <td><?php echo $detail->order_quantity; ?></td>
                         <td><?php echo $detail->product_price; ?></td>
                         <td><?php echo $detail->product_price*$detail->order_quantity; ?></td>
                         <td>
                            <input type="hidden" name="order_code" value="<?= $detail->order_code ?>">
                            <select name="tinhtrang" id="">
                              <option value="1"><p style='color: #34af6d;'>Proccessing</option>
                              <option value="0"><p style='color: red'>Not proccessing</p></option>
                            </select>
                         </td>
                         <td>
                          <input type="submit" value="Update" name="capnhatdonhang"></input>
                         </td>
                         
                    </tr>
                    
                <?php }?>
                    <tr>
                    <td><a href="?controller=order&action=index">Back</a></td>
                  </tr>
            </tbody>
          </table>
          </form>
        </div>
      </section>
    </section>
  </div>
</body>
</html>