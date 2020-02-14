<?php
	session_start();
	$UserID = $_SESSION['UserID'];
	include 'init.php';
	$page = $_GET['page'];
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$name     = $_POST['name'];
		$desc     = $_POST['desc'];
		$price    = $_POST['price'];
		$place    = $_POST['place'];
		$quantity = $_POST['quantity'];
		$category = $_POST['category'];
		if($_POST['offer'] == 'yes'){$offVal = 'NULL';}else{$offVal = $_POST['offerval'];}
		if(!empty($_FILES['Img']['name'])){
			$ImgName = $_FILES['Img']['name']; 
			$Imgsize = $_FILES['Img']['size']; 
			$ImgTmp  = $_FILES['Img']['tmp_name']; 
			$ImgType = $_FILES['Img']['type'];
			$Img = rand(0,100000).'_'. $ImgName;
			move_uploaded_file($ImgTmp,"Data\\".$Img);
		}else{$Img = 'cover.php';}
		if(empty($name) || empty($quantity) || empty($price) || empty($place)){ echo '<div class="container"><alert class="alert alert-danger " role="alert"> Fill All Blanks. </alert></div>'; }
		else{
			$stmt = $con->prepare("INSERT INTO `products` (`ProID`, `CatID`, `ProName`, `ProImg`, `OtherImgs`, `ProPrice`, `ProOffer`, `ProQuantity`, `ProPlace`, `ProDesc`) VALUES (NULL, :CatID, :ProName, :ProImg, '0', :ProPrice, NULL, :ProQuantity, :ProPlace, :ProDesc) ");
			$stmt->execute(array(
				'CatID'    => $category,
				'ProName'  => $name,
				'ProImg'   => $Img,
				'ProPrice' => $price,
				'ProQuantity' => $quantity,
				'ProPlace'    => $place,
				'ProDesc'     => $desc
			));
			header("Location: products.php");
		}
	}
	if($page == 'AddPro'){?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
			<div class="container dash">
				<h1>Add Product</h1>
				<hr/>
				<div class="col-sm-12">
					<div style="margin-bottom:10px" class="row">
						<div class="col-sm-4">
							<label>Product Name</label>
							<input placeholder="Write Name Here.." type="text" name="name" class="form-control" />
						</div>
						<div class="col-sm-8">
							<label>Product Description</label>
							<textarea placeholder="Write Description Here.." rows="3" type="text" name="desc" class="form-control" ></textarea>
						</div>
					</div>
					<div style="margin-bottom:10px" class="row">
						<div class="col-sm">
							<label>Product Image</label>
							<input type="file" name="Img" />
						</div>
						<div class="col-sm">
							<label>Product Price</label>
							<input placeholder="Write Price Here.." type="text" name="price" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Product Place</label>
							<input placeholder="Write Place Here.." type="text" name="place" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Product Quantity</label>
							<input placeholder="Write Quantity Here.." type="int" min="1" name="quantity" class="form-control" />
						</div>
						<div class="col-sm">
							<label>Category</label>
							<select name="category" class="form-control">
								<?php
									$stmt1 = $con->prepare("SELECT * FROM categories ORDER BY CatID DESC ");
									$stmt1->execute();
									$rows1 = $stmt1->fetchAll();
									if (! empty($rows1)) {
										foreach($rows1 as $row1) {
											echo '<option value="'.$row1['CatID'].'">'.$row1['CatName'].'</option>';
										}
									}
						  		?>
							</select>
						</div>
					</div>
				</div>
				<button style="margin-top:20px;" type="submit" class="btn btn-primary btn-block">Add Product</button>
			</div>
		</form>
	<?php
	}
	include $DirTemp.'Footer.php';
?>