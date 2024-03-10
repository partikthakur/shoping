<?php 

	include('connection.php');

$sql="SELECT * FROM category_list";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'common/head.php'; ?>
</head>
<body>

	<?php include 'common/nav.php'; ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/1.avif" class="d-block" alt="..." width="100%" height="500px">
            </div>

            <div class="carousel-item">
                <img src="image/2.avif" class="d-block" alt="..." width="100%" height="500px"> 
            </div>

            <div class="carousel-item">
                <img src="image/3.avif" class="d-block" alt="..." width="100%" height="500px"> 
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<?php if($result->num_rows > 0){ ?>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4">Product List</h2>
                </div>
                <?php foreach ($result as $row) { ?>
                <div class="col-6 col-md-4">
                    <div class="category-card">
                        <a href="productlist.php?category=<?= $row['name'] ?>">
                            <div class="category-card-img">
                                <img src="image/<?= $row['image'] ?>" class="" alt="Laptop" width="100%" height="200">
                            </div>
                            <div class="category-card-body">
                                <h5 style="text-transform: capitalize;"><?= $row['name'] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </div>


<br>


<?php 

}
else{
	echo "category not found";
}
	include ('common/footer.php');
 ?>		




</body>
</html>