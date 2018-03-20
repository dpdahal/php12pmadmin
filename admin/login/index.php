<?php

// require configuration file here
require_once ('../../configuration/configuration.php');
// require database connection file
require_once ('../../connection/connection.php');
// required system file
require_once (ROOT.'system/redirect.php');
require_once (ROOT.'connection/message.php');


if(!empty($_POST) && $_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM tbl_users WHERE username='$userName' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $userData=mysqli_fetch_assoc($result);
    if($userData>0){
        $_SESSION['user_id']=$userData['uid'];
        $_SESSION['user_name']=$userData['username'];
        $_SESSION['user_image']=$userData['image'];
        $_SESSION['user_type']=$userData['user_type'];
        $_SESSION['user_email']=$userData['email'];
        $_SESSION['is_log_in']=TRUE;
        header('Location:http://www.php12pm.com/admin/');
        exit();

    }else{
        $_SESSION['error']='username & password not match';
        header('Location:index.php');
    }
}





?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP12PM : : Loin Page</title>
    <link rel="stylesheet" href="<?=BASE_URL.'bootstrap/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'bootstrap/css/font-awesome.min.css'?>">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Login  Page</h1>
            <hr>
            <?=Messages(); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                 <button class="btn btn-primary">Log In</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>