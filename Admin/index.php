<?php
	session_start();
	$UserID = $_SESSION['UserID'];
if(!isset($UserID)){header("Location: enter.php");}
	include 'init.php';


$stmt = $con->prepare("SELECT COUNT(UserID) FROM `users` ");
$stmt->execute();
$UsersCount = $stmt->fetchColumn();
	

$stmt1 = $con->prepare("SELECT COUNT(ProID) FROM `products` ");
$stmt1->execute();
$ProCount = $stmt1->fetchColumn();
	

$stmt = $con->prepare("SELECT COUNT(ProID) FROM `products` WHERE ProOffers IS NOT NULL ");
$stmt->execute();
$OffersCount = $stmt->fetchColumn();
$stmt = $con->prepare("SELECT * FROM `products` ");
$stmt->execute();
$rows = $stmt->fetchAll();
if (! empty($rows)) {
	$maxSales=0;
	foreach($rows as $row) {	
		$stmt1 = $con->prepare("SELECT COUNT(ProID) FROM `orders` WHERE ProID=? ");
		$stmt1->execute(array($row['ProID']));
		$Sales = $stmt1->fetchColumn();
		if($maxSales<$Sales){
			$MaxPro=$row['ProTitle'];
			$maxSales=$Sales;
		}
	}
}
?>
	<div class="container dash">
		<h1>Dashboard</h1>
		<hr/>
		<div class="container">
			<alert style="display: block;" class="alert alert-info">Max Sales is: <b><?php echo $MaxPro; ?></b>, Number of Sales: <b><?php echo $maxSales; ?></b>.</alert>
			<div class="col-sm-12 cards">
				<div class="row">
					<a class="col-sm" href="users.php" >
						<div class="cardSec">
							<i class="fas fa-users"></i>
							<label>Users</label> (<?php echo $UsersCount; ?>)
						</div>
					</a>
					<a class="col-sm" href="offers.php" >
						<div class="cardSec">
							<i class="fas fa-bezier-curve"></i>
							<label>Offers</label> (<?php echo $OffersCount; ?>)
						</div>
					</a>
					<a class="col-sm" href="items.php" >
						<div class="cardSec">
							<i class="fas fa-bars"></i>
							<label>Products</label> (<?php echo $ProCount; ?>)
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php
	include $DirTemp.'Footer.php';
?>