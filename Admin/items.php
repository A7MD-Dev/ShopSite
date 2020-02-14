<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
?>
	<div class="container dash">
		<h1>Products</h1>
		<hr/>
		<br/>
		<a href="AddProduct.php?page=AddProduct" class="btn btn-primary btn-sm btn-block">Add New Product</a>
		<table class="table table-hover table-bordered">
			<thead class="thead-dark">
				<tr style="color:white;font-weight:bold" class="bg-dark text-center">
					<td class="col-sm-1 text-center">#ID</td>
					<td class="col-sm-3 text-center">Title</td>
					<td class="col-sm-1 text-center">Price</td>
					<td class="col-sm-2 text-center">Quantity</td>
					<td class="col-sm-2 text-center">Offers</td>
					<td class="col-sm-3 text-center">Manage</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$stmt = $con->prepare("SELECT * FROM `products` ");
					$stmt->execute();
					$rows = $stmt->fetchAll();
					if (! empty($rows)) {
						foreach($rows as $row) {
							if($row['ProOffers'] != NULL){
								$offer = "Yes";
								echo '<tr style="background-color:#ffe590" class="text-center">';
							}else{
								$offer = "No";
								echo '<tr class="text-center">';
							}
				
							echo '
								
									<td class="text-center">'.$row['ProID'].'</td>
									<td class="text-center">'.$row['ProTitle'].'</td>
									<td class="text-center">'.$row['ProPrice'].'</td>
									<td class="text-center">'.$row['ProQuantity'].'</td>
									<td class="text-center">'.$offer.'</td>
									<td class="text-center">
										<a href="showPro.php?ProID='.$row['ProID'].'" class="btn btn-warning btn-sm btn-block ">Info</a>
										<a href="offer.php?ProID='.$row['ProID'].'"  class="btn btn-success btn-sm btn-block ">Offer</a>
										<a href="delete.php?Type=Pros&&ProID='.$row['ProID'].'" class="btn btn-danger btn-sm btn-block ">Delete</a>
									</td>
								</tr>
							';
						}
					}
				?>
			</tbody>
		</table>
	</div>
<?php
	include $DirTemp.'Footer.php';
?>