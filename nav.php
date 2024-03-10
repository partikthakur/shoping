<?php   
    
    $sql='select * from category_list';
    $navs = $conn->query($sql);

?>

    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name">E-commerce</h5>
                    </div>

                    <div class="col-md-5 my-auto">
                        <form role="search" action="search.php" method="GET">
                            <div class="input-group">
                                <input type="search" name="query" placeholder="Search your product" class="form-control" />
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    

                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">                            
                            <li class="nav-item">
                                <?php

                                 $count = 0;
                                 if (isset($_SESSION['user_id'])) {                      

                                    $user_id = $_SESSION['user_id']; 

                                    $sqlcount = "select * from cart where user_id=".$user_id." ";

                                    $cartnum = $conn->query($sqlcount);

                                    if ($cartnum->num_rows > 0) {
                                        $count = $cartnum->num_rows;
                                    }
                                    else{
                                        $count = 0;
                                    }
                                }

                                 ?>

                                <a class="nav-link" href="cart.php">
                                    <i class="fa fa-shopping-cart"></i> My Cart (<?php echo $count; ?>)</a>
                            </li>                            

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> Username 
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>

                                    <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>                    
                                                        
                                </ul>
                            </li>

                            <li class="nav-item">
                                <?php 

                                    if (isset($_SESSION['username'])){                   
                                 ?>
                                 
                                <a class="nav-link" href="logout.php">
                                   <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                                   Logout
                                </a>

                                <?php }
                                 else{ ?>

                                <a class="nav-link" href="logout.php">
                                   <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                                   Login
                                </a>

                                <?php }
                                 ?>

                            </li>
                        </ul>
                    </div>      
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>

					    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					        <?php foreach ($navs as $row) {?>
                            <a class="dropdown-item" href="productlist.php?category=<?= $row['name'] ?>" style="text-transform: capitalize;">
                                    <?= $row['name'] ?></a>
                            <?php } ?>
                        </div>
						</li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>



    