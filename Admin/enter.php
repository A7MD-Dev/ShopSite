<?php
	session_start();
	$noNav = '';
	include 'init.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(empty($email) || empty($password)){
			echo '
				<hr/>
					<div class="alert alert-danger">
						Sorry, Please Fill All Blanks.
					</div>
				<hr/>
			';
		}else{
			$stmt = $con->prepare("SELECT * FROM users WHERE Email=? AND Password=? AND GroupID= 2 LIMIT 1");
			$stmt->execute(array($email,$password));
			$rows = $stmt->fetchAll();
			if (! empty($rows)) {
				foreach($rows as $row) {
					$_SESSION['UserID'] = $row['UserID'];
					header("Location: index.php");
				}
			}else{
				echo '
				<hr/>
					<div class="alert alert-danger">
						Sorry, Wrong Data.
					</div>
				<hr/>
			';
			}
		}
	}
?>
<div class="container">
	<form id="Form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<h2>Log In</h2>
		<input placeholder="Write Email.." type="email" name="email" class="form-control" />
		<input placeholder="Write Password.." type="password" name="password" class="form-control" />
		<button class="btn btn-primary btn-block" type="submit">Log In</button>
	</form>
</div>
		
	
