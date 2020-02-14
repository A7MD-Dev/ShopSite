<?php
session_start();
	include 'init.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
		if(empty($name) || empty($email) || empty($subject) || empty($msg) ){
			echo '<alert class="alert alert-danger">fill all blanks </alert>';
			header('Refresh:2');
		}else{
			$stmt = $con->prepare("INSERT INTO `messages` (`MsgID`, `SenderName`, `SenderEmail`, `MsgSubject`, `MsgContent`, `MsgStatus`) VALUES (NULL, :SenderName, :SenderEmail, :MsgSubject, :MsgContent, '1')  ");
			$stmt->execute(array(
				'SenderName'=>$name,
				'SenderEmail'=>$email,
				'MsgSubject'=>$subject,
				'MsgContent'=>$msg
			));
			echo '<alert class="alert alert-success">Succefully </alert>';
			header('Refresh:2');
		}
	}
?>
	<div class="container dash">
		<h1>Contact Us</h1>
		<hr/>

		<div class="col-sm-12">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm">
								<label>Name</label>
								<input name="name" class="form-control" name="" placeholder="write here.."/>
							</div>
							<div class="col-sm">
								<label>Email</label>
								<input name="email" class="form-control" name="" placeholder="write here.."/>
							</div>
							<div class="col-sm">
								<label>Subject</label>
								<input name="subject" class="form-control" name="" placeholder="write here.."/>
							</div>
						</div>
						<div style="margin-top:5px" class="col-sm-12">
							<label>Msg</label>
							<textarea name="msg" placeholder="write here.." class="form-control" rows="4"></textarea>
						</div>
					</div>
					<button style="margin-top:10px" type="submit" class="btn btn-primary btn-block btn-sm">Send</button> 
				</form>
		</div>
		
	</div>
<?php
	include $DirTemp.'Footer.php';
?>