<?php
session_start();
if(!isset($_SESSION['UserID'])){
	header('Location: enter.php');
}
	include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$UserID = $_POST['UserID'];
	$ProID = $_POST['ProID'];
if($_POST['type']=="card"){	
	$CardNum = $_POST['CardNum'];
	$CardName = $_POST['CardName'];
	$CardDate = $_POST['CardDate'];
	$CardCVV = $_POST['CardCVV'];
	if(!empty($CardNum) && !empty($CardName) && !empty($CardDate) && !empty($CardCVV) ){
		$stmt1 = $con->prepare("INSERT INTO `cards` (`CardID`, `CardNum`, `CardName`, `CardDate`, `CardCVV`) VALUES (NULL, :CardNum, :CardName, :CardDate, :CardCVV) ");
		$stmt1->execute(array(
			'CardNum'=>$CardNum,
			'CardName'=>$CardName,
			'CardDate'=>$CardDate,
			'CardCVV'=>CardCVV
		));
	}
}
	
	$stmt = $con->prepare("INSERT INTO `orders` (`OrdID`, `UserID`, `ProID`, `OrdStatus`) VALUES (NULL, :UserID, :ProID, '0')  ");
	$stmt->execute(array(
	'UserID'=>$UserID,
	'ProID'=>$ProID
	));
	echo '<alert class="alert alert-success">Order Successfully.</alert><br/><br/>';
	echo '<alert class="alert alert-info">Redircet after 5 Seconds.</alert>';
	header('Refresh:5; url=index.php');
}



$stmt = $con->prepare("SELECT * FROM products WHERE ProID=? ");
$stmt->execute(array($_GET['ProID']));
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	foreach($rows as $row) {
		echo '
			<div class="container dash">
			<h1>Payment</h1>
			<hr/>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">
				<form style="width:100%" action="'.$_SERVER['PHP_SELF'].'" method="POST">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<input name="type" value="cash" type="radio" aria-label="Radio button for following text input">
								</div>
							</div>
							<div style="margin-left: 5px">Cash Pay</div>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<input name="type" value="card" type="radio" aria-label="Radio button for following text input">
								</div>
							</div>
							<div style="margin-left: 5px">Credit Card (Mada)</div>
						</div>
					</div>
					<div class="col-sm-9">
						
							<div class="row">
							<input type="hidden" name="UserID" value="'.$_SESSION['UserID'].'"/>
							<input type="hidden" name="ProID" value="'.$_GET['ProID'].'"/>
							<div class="col-sm-6">
								<label>Number Card</label>
								<input name="CardNum" placeholder="5310 5310 5310" class="form-control" />
							</div>
							<div class="col-sm-6">
								<label>Owner Name</label>
								<input name="CardName" placeholder="Sample User" class="form-control" />
							</div>
							<div class="col-sm-6">
								<label>CVV</label>
								<input name="CardCVV" placeholder="***" class="form-control" />
							</div>
							<div class="col-sm-6">
								<label>Date</label>
								<input name="CardDate" placeholder="DD-MM-YYYY" class="form-control" />
							</div><br/>
							<button style="margin-top:10px" class="btn btn-success btn-sm btn-block" type="submit">Pay</button>
						</div>
						</form>
						
					</div>
				</div>
			</div>
		';
	}
}
	include $DirTemp.'Footer.php';
?>