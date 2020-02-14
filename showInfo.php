<?php
	include 'init.php';
$stmt = $con->prepare("SELECT * FROM products WHERE ProID=? ");
$stmt->execute(array($_GET['OrdID']));
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	foreach($rows as $row) {
		echo '
			<div class="container dash">
			<h1>Bill</h1>
			<hr/>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">
						<img src="Admin/Data/'.$row['ProImg'].'" width="100%" />
						<hr>
						<p><b>Title:</b> '.$row['ProTitle'].'.</p>
						<p><b>Price:</b> '.$row['ProPrice'].'.</p>
						<p><b>Status:</b> '.$_GET['Status'].'.</p>
					</div>
					<div class="col-sm-9">
						
					</div>
				</div>
			</div>
		';
	}
}
	include $DirTemp.'Footer.php';
?>