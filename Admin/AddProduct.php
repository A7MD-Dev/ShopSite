<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
	$page = $_GET['page'];
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name     = $_POST['name'];
		$tax    = $_POST['tax'];
		$price    = $_POST['price']+$tax;
		$quantity = $_POST['quantity'];
		$det      = $_POST['det'];
		$offerBool = $_POST['offer-bool'];
		if($offerBool == "yes"){$Offer=$_POST['offer'];}else{$Offer=NULL;}
		
		if(empty($name) || empty($price) || empty($quantity)|| empty($det) || empty($offerBool) ){ echo '<div class="container"><alert class="alert alert-danger " role="alert"> Fill All Blanks. </alert></div>'; }
		else{
			
			if(!empty($_FILES['Img']['name'])){
				$ImgName = $_FILES['Img']['name']; 
				$Imgsize = $_FILES['Img']['size']; 
				$ImgTmp  = $_FILES['Img']['tmp_name']; 
				$ImgType = $_FILES['Img']['type'];
				$Img = rand(0,100000).'_'. $ImgName;
				move_uploaded_file($ImgTmp,"Data\\".$Img);
			}else{$Img = 'cover.php';}

			
			$stmt = $con->prepare("INSERT INTO `products` (`ProID`, `ProImg`, `ProTitle`, `ProDesc`, `ProPrice`, `ProQuantity`, `ProOffers`) VALUES (NULL, :ProImg, :ProTitle, :ProDesc, :ProPrice, :ProQuantity,:ProOffers) ");
			$stmt->execute(array(
				'ProImg'     => $Img,
				'ProTitle'   => $name,
				'ProDesc'    => $det,
				'ProPrice'   => $price,
				'ProQuantity' => $quantity,
				'ProOffers' => $Offer
			));
			header("Location: items.php");
		}
	}
	if($page == 'AddProduct'){?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<div class="container dash">
				<h1>Add Product</h1>
				<hr/>
				<div class="col-sm-12">
					<div style="margin-bottom:10px" class="row">
						<div class="col-sm">
							<label>Item Name</label>
							<input placeholder="Write Name Here.." type="text" name="name" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Item Img</label><br>
							<input type="file" name="Img"/>
						</div>
						<div class="col-sm">
							<label>Item Price</label>
							<input placeholder="Write Price Here.." type="text" name="price" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Item Quantity</label>
							<input placeholder="Write Quantity Here.." type="text" name="quantity" class="form-control" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<label>Offer</label>
							<select name="offer-bool" class="form-control">
								<option value="yes">Yes</option>
								<option value="no">No</option>
							</select>
						</div>
						<div class="col-sm">
							<label>New Price (Offer)</label>
							<input placeholder="Write Offer Here.." type="number" name="offer" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Tax</label>
							<input placeholder="Write Tax Here.." type="number" name="tax" class="form-control" />
						</div>
					</div>
					<div class="row">
						<br/>
						<label style="margin-top:12px">Details</label><br/>
						<textarea class="form-control" placeholder="write here..." name="det" type="text" rows="4" ></textarea>
					</div>
				</div>
				<button style="margin-top:20px;" type="submit" class="btn btn-primary btn-block btn-sm">Add Product</button>
			</div>
		</form>
	<?php
	}
	include $DirTemp.'Footer.php';
?>