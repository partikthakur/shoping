<?php 
include('connection.php');
// error_reporting(0);

if (isset($_POST['last_id'])) {
	$id=$_POST['last_id'];
	$_SESSION['last_id'] = $id;
}

if (isset($_SESSION['delete_check']) && $_SESSION['delete_check'] != '') {
	echo "<script>alert('Item delete successfully');</script>";	
	$_SESSION['delete_check'] = '';
}

if(!isset($_SESSION['username'])) {
    header("location: login.php");
}

if (isset($_SESSION['user_id'])) {
	
	$user_id = $_SESSION['user_id'];
	
	if (isset($_POST['qty'])) {
		$product_id = $_SESSION['last_id'];
		$qty = $_POST['qty'];

		 $check_sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            $update_sql = "UPDATE cart SET qty = qty + $qty WHERE user_id = $user_id AND product_id = $product_id";
            $conn->query($update_sql);

        } else {
           
            $insert_sql = "INSERT INTO cart (user_id, product_id, qty) VALUES ($user_id, $product_id, $qty)";
            $conn->query($insert_sql);
        }

		echo "<script type='text/javascript'>alert('product added into cart successfully');</script>" ;
	}

}

$user_id = $_SESSION['user_id'];

$sqlSelect = "
select 
c.user_id,p.product_name,p.product_image,p.product_prize,c.qty,p.product_id 
from cart c
inner join
product_list p
on c.product_id=p.product_id
and c.user_id=".$user_id." 
";

$result = $conn->query($sqlSelect);


if(isset($_POST['save_qty'])) {
    $product_id = $_POST['product_id'];
    $new_qty = $_POST['new_qty'];
    
    $update_sql = "UPDATE cart SET qty = $new_qty WHERE user_id = $user_id AND product_id = $product_id";    
    $conn->query($update_sql);

    header("location: cart.php");
}


?>


<!DOCTYPE html>
<html>
<head>

    <?php include 'common/head.php'; ?>

</head>
<body>

<?php 
include('common/nav.php'); 
 ?>

		<div class="container mb-5">
		    <div class="row">
		    	<div class="col-md-12 text-center border rounded bg-light my-5">
		    		<h1>My Cart</h1>
		    	</div>

		        <div class="col-md-12">
		            <table class="table">

		              <thead>
		                <tr class="text-center">
		                  <th scope="col">product image</th>
		                  <th scope="col">product name</th>
		                  <th scope="col">product price</th>
		                  <th scope="col">quantity</th>
		                  <th scope="col">total price</th>
		                </tr>
		              </thead>

		              <?php 
		              $total = 0;
		              foreach ($result as $row) { ?>

		              <tbody>
		                <tr class="text-center">
		                  <th scope="row"><img src="image/<?= $row['product_image'] ?>" style="height: 100px;"></th>

		                  <td><?= $row['product_name'] ?></td>

		                  <td><?php echo $row['product_prize'];?></td>

		                  <td>
		                  	<p class="old_qty"><?= $row['qty'] ?></p>

		                  	<form action="cart.php" method="POST">

		                  	  <input type="number" class="form-control new_qty" name="new_qty" style="display: none;" value="<?= $row['qty'] ?>">

		                  </td>

		                  <td><?= $row['product_prize']*$row['qty'] ?></td>

		                  <?php //$total+=$row['product_prize']*$row['qty'];?>

		                  <td>

		                      <input type="hidden" name="product_id" 
		                      value="<?= $row['product_id'] ?>">

		                     <button type="button" class="btn btn-success edit-btn">Edit</button>

		                     <button type="submit" name="save_qty" style="display: none;" class="btn btn-primary save">Save</button>
		                    </form>

		                    <script type="text/javascript">
								$(document).ready(function(){
								  $(".edit-btn").click(function(){
								  	var row = $(this).closest("tr");
								  	row.find(".edit").hide();
								  	row.find(".edit-btn").hide();
								  	row.find(".old_qty").hide();
								  	row.find(".delete").hide();
								  	row.find(".save").show();						    
								  	row.find(".new_qty").show();

								  	});

								  });
		                    </script>

		                  </td>

		                  <td>
		                  	<form action="remove_item.php" method="post">

		                      <input type="hidden" name="product_id"
		                       value="<?=$row['product_id']; ?>">

		                      <button type="submit" class="btn btn-danger delete">Delete</button>
		                    </form>
		                  </td>		                  

		                </tr>    
		              </tbody>
		        <?php } ?>
		            </table>

		        </div>

			   		<!-- <div class="col-md-6">
	           			<div class="border bg-light rounded p-4">

			                <h4>Total:</h4>
			                <h5><?php echo $total ?></h5>
			                <h4>GST (18%):</h4>
			                <h5><?php echo $total * 0.18 ?></h5>
			                <h4>Total Amount:</h4>
			                <h5><?php echo $total * 1.18 ?></h5>
			                <br>

			                <form>
			                    <button class="btn btn-primary btn-block">Make purchase</button>
			                </form>

	            		</div>
	        		</div>   -->


	        		<div class="col-md-12 text-center my-3">
		                <form action="checkout_page.php" method="post">
		    				<button type="submit" class="btn btn-primary btn-lg">Checkout</button>
		    			</form>
		    		</div>
  
		    </div>
		</div>

		




<?php include 'common/footer.php'; ?>

</body>
</html>
