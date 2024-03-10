<?php 

	include('connection.php');
	
	$product_id=$_GET['id'];
	$sql="SELECT * FROM product_list where product_id='".$product_id."'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'common/head.php'; ?>
</head>
<body>
<?php 	include 'common/nav.php'; ?>
	<div class="container">
        <div class="row">

				<?php foreach ($result as $row) { ?>
				<div class="col-md-3" style="padding-top: 30px;">
			        <div class="product-card">
			            <div class="product-card-img">
			                <a href="">			                    
			                    <img src="image/<?= $row['product_image'] ?>">
			                </a>
			            </div>

			                <div class="product-card-body">                            
			                    <h5 class="product-name">
			                        
			                    </h5>

			                    <div class="text-center">
			                       	<h4><?= $row['product_prize'] ?> </h4>
			                    </div>
<br>
			                    <div class="mt-2 text-center">
			                        <form method="post" action="cart.php">

			                        	<input class="text-center" type="number" value="1" min="1" name="qty" style="width:50px;">&nbsp;&nbsp;

			                        	<input type="hidden" name="last_id" value="<?= $row['product_id'] ?>">

			                        	<input type="submit" value="Add to Cart"><br>
			                        </form>
			                    </div>
			            	</div>
			        </div>
			    </div>   		

			<?php } ?>

				<div class="col-md-9">
					<center><h3>Description_____</h3></center>
					<p><?= $row['Description'] ?></p>
				</div>
		</div>
	</div>

<br><br>

		
        

    



<?php
	include('common/footer.php');
	?>
		  	
<?php 
}
 ?>  		

</body>
</html>  		





