
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Don hang</title>
	<!-- <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
	<link rel="stylesheet" href="theme/css/stylee.css">
	<link rel="stylesheet" href="theme/css/styles.css">
</head>
<body>
	
<div class="container" style="max-width: 100%;">
    <section class="main">
		<!-- <div class="main-top">
			<h1>Recent Customer</h1>
			<i class="fas fa-user-cog"></i>
		</div>
		<div class="users">
			<div class="card">
				<img src="../view/images/product-7.jpg">
				<h4><?= $row_dm['name']?></h4>
				<p>?</p>
				<div class="per">
					<table>
					<tr>
						<td><span><?= $row_dm['sanpham_name']?></span></td>
						<td><span><?= $row_dm['soluong']?></span></td>
					</tr>
					<tr>
						<td>Name</td>
						<td>Quantity</td>
					</tr>
					</table>
				</div>
				<a href="index.php?act=themdanhmuc" style="color: black">ADD</a>
			</div>
		
		</div> -->
		<section class="attendance">
			<div class="attendance-list">
				<h1>Customer List</h1>

				<table class="table">
				<thead>
				<tr>
						<th>STT</th>
						<th>Client Name</th>
						<th>Client Phone</th>
						<th>Client Address</th>
						<th>Client Email</th>
						<th>Name Card</th>
						<th>Number Card<</th>
						<!-- <th>Manage</th> -->
				</tr>
				</thead>
				<tbody>
					<?php
					$i=0;
					foreach($customers as $customer){?>
					<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $customer->client_name ?></td>
							<td><?php echo $customer->client_phone ?></td>
							<td><?php echo $customer->client_address ?></td>
							<td><?php echo $customer->client_email ?></td>
							<td><?php echo $customer->name_card ?></td>
							<td><?php echo $customer->number_card ?></td>
							<!-- <td><a href="?act=user&khachhang=<?php echo $row_kh['magiaodich'] ?>">View Transaction</a></td> -->
					</tr>
				<?php }
					?>
				</tbody>
				</table>
			</div>
		</section>

		<section class="attendance">
			<div class="attendance-list">
				<h1>Review</h1>

				<table class="table">
				<thead>
				<tr>
						<th>STT</th>
						<th>Review Content</th>
						<th>Name Customer</th>
						<th></th>
				</tr>
				</thead>
				<tbody>
					<?php
					$db = Db::getInstance();
					$sql = $db->query("SELECT * FROM tbl_review ORDER BY review_id DESC");
					$i=0;
					foreach($sql->fetchAll() as $kh){?>
					<tr>
						<td><?php echo $i++; ?></td>
						
						<td><?php echo $kh['review_content']; ?></td>
					
						<td style="color: red"><?php echo $kh['client_name']; ?></td>
						
						<!-- <td><?php echo $kh['ngaythang'] ?></td> -->
					
					
					</tr>
					<?php }
					?> 
					

				</tbody>
				</table>
			</div>
		</section>
    </section>
  </div>
</body>
</html>