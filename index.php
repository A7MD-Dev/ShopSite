<?php
session_start();
	include 'init.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$num = $_POST['num'];
		$stmt = $con->prepare("INSERT INTO `subscribe` (`SubID`, `SubNum`) VALUES (NULL, $num) ");
		$stmt->execute();
		echo '<alert class="alert alert-success">subscribed </alert>';
		header('Refresh:2');
	}
?>
	<div class="container dash">
		<h1>Products</h1>
		<hr/>
<form style="width:40%;margin:10px" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<div class="input-group">
		<input placeholder="write number here.." class="form-control" name="num" />
		<div class="input-group-append">
			<button class="btn btn-outline-warning" type="submit">Subscribe</button>
		</div>
	</div>
</form>
		<div class="col-sm-12">
			<div class="row">
				
<?php
$stmt = $con->prepare("SELECT * FROM products ORDER BY ProID DESC ");
$stmt->execute();
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	foreach($rows as $row) {
		echo '
			<div class="col-sm-3">
				<div class="card" style="width: 100%;">
					<img src="Admin/Data/'.$row['ProImg'].'" class="card-img-top" alt="'.$row['ProTitle'].'">
					<div class="card-body">
						<h5 class="card-title">'.$row['ProTitle'].'</h5>
						<p class="card-text">'.substr($row['ProDesc'], 0, 150).'.</p>
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