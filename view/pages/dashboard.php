
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="theme/css/style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- CONTENT -->
	<section id="content" style="width:auto; left: 0;overflow: hidden">

		<!-- MAIN -->
		<main style="padding: 70px 24px;">
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php
						$db = Db::getInstance();
						$sql = $db->query("SELECT COUNT(*) AS total FROM tbl_order");
						$order = $sql->fetch();
						 if(isset($order['total']))	echo $order['total'];
						 else echo " ";
						 ?></h3>
						<p>Total Order</p>
					</span>
				</li>
				<li>

					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php
						$db = Db::getInstance();
						$sql = $db->query("SELECT COUNT(*) AS total FROM tbl_client");
						$client = $sql->fetch();
						if($client['total'])	echo $client['total'];
						else	echo " ";
						 ?></h3>
						<p>Customers</p>
					</span>
				</li>
				<li>
				
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
					<?php
					// $sql_select_dm = mysqli_query($conn, 
					// "SELECT * FROM donhang,sanpham WHERE 
					// donhang.sanpham_id=sanpham.sanpham_id");
					// $data = mysqli_fetch_assoc($sql_select_dm);
					?>
						<h3><?php
						$db = Db::getInstance();
						$sql = $db->query("SELECT * FROM tbl_order, tbl_product WHERE
						tbl_order.product_id = tbl_product.product_id");
						$row = $sql->fetch();
						if($row){
							echo $row['order_quantity']*$row['product_price'];
						}else{
							echo " ";
						}
							
						 ?> VND</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
					<?php
						$db = Db::getInstance();
						$sql_select_dm = $db->query("SELECT * FROM tbl_order,tbl_client,tbl_product
						WHERE tbl_order.product_id = tbl_product.product_id AND 
						tbl_client.client_id = tbl_order.client_id 
						ORDER BY order_id DESC LIMIT 2");
						foreach($sql_select_dm->fetchAll() as $row){?>
							<tr>
								<td>
									<a href="?act=order">
									<img src="theme/images/icons/author.jpg">
									</a>
									
									<p><?= $row['client_name']?></p>
								</td>
								<td><?= $row['order_time']?></td>
								<td><span class="status completed"><?= $row['order_status']?></span></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Recent Customer Comment</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<?php
						$db = Db::getInstance();
						$sql_select_rv = $db->query("SELECT * FROM tbl_review");
						foreach($sql_select_rv->fetchAll() as $row){?>
						<li class="completed">
							<p><?= $row['review_content'] ?>
							(<a href="?controller=pages&action=dashboard" 
							style="color: green"><?= $row['client_name'] ?></a>)</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<?php }

						?>
						
						<!-- <li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li> -->
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src=""></script>
</body>
</html>