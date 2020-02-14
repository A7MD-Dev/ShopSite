<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
?>
	<div class="container dash">
		<h1>Bills</h1>
		<hr/>
		<br/>
		
		<table class="table table-hover table-bordered">
			<thead class="thead-dark">
				<tr style="color:white;font-weight:bold" class="bg-dark ">
					<td class="col-sm-1">#ID</td>
					<td class="col-sm-4">Product</td>
					<td class="col-sm-2">Price</td>
					<td class="col-sm-2">Status</td>
					<td class="col-sm-2">Manage</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$stmt = $con->prepare("SELECT * FROM bills ");
					$stmt->execute();
					$rows = $stmt->fetchAll();
					if (! empty($rows)) {
						foreach($rows as $row) {
							
							$stmt11 = $con->prepare("SELECT * FROM orders WHERE OrdID=? ");
							$stmt11->execute(array($row['BillID']));
							$rows11 = $stmt11->fetchAll();
							if (! empty($rows11)) {
								foreach($rows11 as $row11) {
									
									$stmt1 = $con->prepare("SELECT * FROM products WHERE ProID=? ");
									$stmt1->execute(array($row11['ProID']));
									$rows1 = $stmt1->fetchAll();
									if (! empty($rows1)) {
										foreach($rows1 as $row1) {
											$ProID=$row1['ProID'];
											$product=$row1['ProTitle'];
											$price=$row1['ProPrice'];
										}
									}
									if($row11['OrdStatus']==1){
										$OrdStatus="Cancel";
									}else{
										$OrdStatus="Done";
									}
								}
							}
							echo '
								<tr>
									<td>'.$row['BillID'].'</td>
									<td>'.$product.'</td>
									<td>'.$price.'</td>
									<td>'.$OrdStatus.'</td>
									<td>
										<a href="showInfo.php?OrdID='.$ProID.'&&Status='.$OrdStatus.'" class="btn btn-success btn-sm btn-block">Show Or Print</a>
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