<?php
include 'connection.php';

if(isset($_POST['product_id']) && isset($_SESSION['user_id'])) {

    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; 
    echo $product_id;

    $remove_sql = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $delete_check = $conn->query($remove_sql);
    $_SESSION['delete_check'] = $delete_check;    
   
    header("location: cart.php");
    
} else {
    
}



?>
