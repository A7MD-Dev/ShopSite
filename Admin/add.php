<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
	$page = $_GET['page'];
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name  = $_POST['name'];
		$email = $_POST['email'];
		$pass  = $_POST['pass'];
		$type  = $_POST['type'];
		
		if(empty($name) || empty($email) || empty($pass)){ echo '<div class="container"><alert class="alert alert-danger " role="alert"> Fill All Blanks. </alert></div>'; }
		else{
			
		if(!empty($_FILES['avatar']['name'])){
			$ImgName = $_FILES['avatar']['name']; 
			$Imgsize = $_FILES['avatar']['size']; 
			$ImgTmp  = $_FILES['avatar']['tmp_name']; 
			$ImgType = $_FILES['avatar']['type'];
			$Img = rand(0,100000).'_'. $ImgName;
			move_uploaded_file($ImgTmp,"Data\\".$Img);
		}else{$Img = 'cover.php';}
			
			
			$stmt = $con->prepare("INSERT INTO `users` (`UserID`, `Avatar`, `Username`, `Email`, `Password`, `Activation`, `GroupID`) VALUES (NULL, :Avatar, :Username, :Email, :Password, '1', :GroupID) ");
			$stmt->execute(array(
				'Avatar'   => $Img,
				'Username' => $name,
				'Email'    => $email,
				'Password' => $pass,
				'GroupID'  => $type
			));
			header("Location: users.php");
		}
	}
	if($page == 'AddUser'){?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<div class="container dash">
				<h1>Add User</h1>
				<hr/>
				<div class="col-sm-12">
					<div style="margin-bottom:10px" class="row">
						<div class="col-sm">
							<label>Username</label>
							<input placeholder="Write Name Here.." type="text" name="name" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Avatar</label><br/>
							<input type="file" name="avatar"  />
						</div>
						<div class="col-sm">
							<label>Email</label>
							<input placeholder="Write Email Here.." type="email" name="email" class="form-control" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<label>Password</label>
							<input placeholder="Write Password Here.." type="password" name="pass" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Type</label>
							<select name="type" class="form-control">
								<option value="2">Admin</option>
								<option value="1">User</option>
							</select>
						</div>
					</div>
				</div>
				<button style="margin-top:20px;" type="submit" class="btn btn-primary btn-block">Add User</button>
			</div>
		</form>
	<?php
	}
	include $DirTemp.'Footer.php';
?>