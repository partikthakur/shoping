<?php 

    include('connection.php');

$category = $_GET['category'];

$sql="SELECT * FROM product_list where category = '$category'";
$result=$conn->query($sql);
if($result->num_rows > 0){
    
?>


<!doctype html>
<html lang="en">
<head>
    <?php include 'common/head.php'; ?>
</head>
<body>

    <?php include 'common/nav.php'; ?>


    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>

                <?php foreach ($result as $row) { ?>

                <div class="col-md-3" style="width: 30%;">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a href="productinfo.php?id=<?=$row['product_id']; ?>">             
                            <img src="image/<?= $row['product_image'] ?>" style="height: 200px;">
                        </div>

                        <div class="product-card-body text-center" >                            
                            <h5 class="product-name" style="text-transform: capitalize;">
                              <?= $row['product_name'] ?> 
                            </h5>
                            <div>
                               <h4><?= $row['product_prize'] ?> </h4>
                            </div>
                            <div class="mt-2">                                
                                <a href="productinfo.php?id=<?=$row['product_id']; ?>" class="btn btn-success"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <?php 
        include('common/footer.php');
     ?>
</body>
</html>

<?php 
 
}
else{
    echo "failed to fetch product";
}

 ?>