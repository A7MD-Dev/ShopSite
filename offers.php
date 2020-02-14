<?php
	include 'init.php';
?>
	<div class="container dash">
		<h1>Offer Products</h1>
		<hr/>
		
		<div class="col-sm-12">
			<div class="row">
<?php
$stmt = $con->prepare("SELECT * FROM products WHERE ProOffers IS NOT NULL ORDER BY ProID DESC ");
$stmt->execute();
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	foreach($rows as $row) {
		echo '
			<div class="col-sm-3">
				<div class="card" style="width: 100%;">
					<img src="Admin/Data/'.$row['ProImg'].'" class="card-img-top" alt="'.$row['ProTitle'].'">
					<div class="card-body">
						<h5 class="card-title">'.$row['ProTitle'].'.</h5>
						<p class="card-text">'.substr($row['ProDesc'], 0, 150).'.</p>
						<p><b>( '.$row['ProOffers'].' <sub>Riyal</sub> )</b></p>
						
						<a href="info.php?ProID='.$row['ProID'].'" class="btn btn-success btn-block btn-sm">See Details</a>
						<a href="order.php?ProID='.$row['ProID'].'" class="btn btn-primary btn-block btn-sm">Make Orders</a>
					</div>
				</div>
			</div>
		';
	}
}
?>
				
				
				
				
				
			</div>
		</div>
		
	</div>
<?php
	include $DirTemp.'Footer.php';
?>