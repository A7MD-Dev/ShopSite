<?php

	include 'init.php';

	$type = $_GET['Type'];
	if($type == 'Pics'){
		$PicID = $_GET['PicID'];
		$stmt = $con->prepare("DELETE FROM gallery WHERE ImgID = ?");
		$stmt->execute(array($PicID));
		header("Location: gallery.php");
	}
	if($type == 'Msgs'){
		$MsgID = $_GET['ConID'];
		$stmt = $con->prepare("DELETE FROM contact WHERE ConID = ?");
		$stmt->execute(array($MsgID));
		header("Location: messages.php");
	}
	if($type == 'Pros'){
		$ReqID = $_GET['ProID'];
		$stmt = $con->prepare("DELETE FROM products WHERE ProID = ?");
		$stmt->execute(array($ReqID));
		header("Location: items.php");
	}
	if($type == 'Secs'){
		$SecID = $_GET['FarmID'];
		$stmt = $con->prepare("DELETE FROM farms WHERE FarmID = ?");
		$stmt->execute(array($SecID));
		header("Location: farms.php");
	}
	if($type == 'plams'){
		$SecID = $_GET['PlamID'];
		$ID = $_GET['FarmID'];
		$stmt = $con->prepare("DELETE FROM plams WHERE PlamID = ?");
		$stmt->execute(array($SecID));
		header("Location: plams.php?FarmID=".$ID." ");
	}
	if($type == 'User'){
		$UserID = $_GET['UserID'];
		$stmt = $con->prepare("DELETE FROM users WHERE UserID = ?");
		$stmt->execute(array($UserID));
		header("Location: users.php");
	}
	if($type == 'Cons'){
		$DocID = $_GET['DocID'];
		$SecID = $_GET['SecID'];
		$ConID = $_GET['ConID'];
		$stmt = $con->prepare("DELETE FROM consultations WHERE ConID = ?");
		$stmt->execute(array($ConID));
		header("Location: consulitions.php?DocID=".$DocID."&&SecID=".$SecID."");
	}

?>