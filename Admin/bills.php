<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
?>
	<div class="container dash">
		<h1>Users</h1>
		<hr/>
		<br/>
		
		<table class="table table-hover table-bordered">
			<thead class="thead-dark">
				<tr style="color:white;font-weight:bold" class="bg-dark ">
					<td class="col-sm-1">#ID</td>
					<td class="col-sm-4">Full Name</td>
					<td class="col-sm-2">Email</td>
					<td class="col-sm-2">Password</td>
					<td class="col-sm-1">Type</td>
					<td class="col-sm-2">Manage</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$stmt = $con->prepare("SELECT * FROM users ORDER BY UserID DESC ");
					$stmt->execute();
					$rows = $stmt->fetchAll();
					if (! empty($rows)) {
						foreach($rows as $row) {
							if($row['GroupID']==1){
								$Type="User";
							}else{
								$Type="Admin";
							}
							echo '
								<tr>
									<td>'.$row['UserID'].'</td>
									<td>'.$row['Username'].'</td>
									<td>'.$row['Email'].'</td>
									<td>'.$row['Password'].'</td>
									<td>'.$Type.'</td>
									<td>
										<a href="showInfo.php?UserID='.$row['UserID'].'" class="btn btn-success btn-sm">Show</a>
										<a href="delete.php?Type=User&&UserID='.$row['UserID'].'" class="btn btn-danger btn-sm">Delete</a>
									</td>
								</tr>
							';
						}
					}
				?>
			</tbody>
		</table>
		<a href="add.php?page=AddUser" class="btn btn-primary btn-sm">Add New User</a>
	</div>
<?php
	include $DirTemp.'Footer.php';
?>