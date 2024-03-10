<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "select * from sign where username='".$username."' and password='".$password."' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $temprow = $result->fetch_assoc();

        if (isset($_SESSION['last_id'])) {
            header("location: productinfo.php?id=".$_SESSION['last_id']."");
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $temprow['user_id'];
        }
        else{
            header("location: index.php");
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $temprow['user_id'];
        }
    } else {
        echo "Login failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {            
            background-image: url('image/3.jpeg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 50px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8); 
        }
        .form-group {
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 30px;
        }
        button {
            width: 100%;
        }
        a.btn {
            display: block;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <div class="row">
        <h1 class="text-center">Login</h1>

        <form action="login.php" method="post">
            <div class="form-group col-md-6">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputusername">      
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <br>                  
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="signup.php" class="btn btn-success">Signup</a>
        </form>
    </div>
</div>

</body>
</html>

