<?php
	include 'init.php';
$stmt = $con->prepare("SELECT * FROM products WHERE ProID=? ");
$stmt->execute(array($_GET['ProID']));
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	foreach($rows as $row) {
		echo '
			<div class="container dash">
			<h1>'.$row['ProTitle'].'</h1>
			<hr/>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">
						<img src="Admin/Data/'.$row['ProImg'].'" width="100%" />
						<hr>
						<p><b>Price:</b> '.$row['ProPrice'].'.</p>
						<p><b>Quantity:</b> '.$row['ProQuantity'].'.</p>
					</div>
					<div class="col-sm-9">
						<b>Description:</b>
						<p>'.$row['ProDesc'].'.</p>
						<div class="row">
							<div class="col-sm-12"><a href="order.php?ProID='.$row['ProID'].'" class="btn btn-primary btn-sm btn-block">Make Order</a></div>
						</div>
					</div>
				</div>
			</div>
		';
	}
}
	include $DirTemp.'Footer.php';
?>