<?php

$username = '';

if (!empty($_POST) && !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $useType = $_POST['user_type'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['password_confirmation']);
    if ($password != $cpassword) {
        $_SESSION['error'] = 'password not match';
        to('add_user');
    }

    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $ext;
    $tmpName = $_FILES['upload']['tmp_name'];
    $error = $_FILES['upload']['error'];
    $imageExt = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadPath = ROOT . 'public/images/userimages/';
    if ($error == 0) {
        if (in_array($ext, $imageExt)) {
            if (move_uploaded_file($tmpName, $uploadPath . $imageName)) {
                $image = $imageName;
            } else {
                $_SESSION['error'] = 'there was a problems';
                to('add_user');
            }
        }

    } else {
        $_SESSION['error'] = 'image format must be' . implode(',', $imageExt);
        to('add_user');
    }

    $query = "INSERT INTO tbl_users(name,username,email,user_type,image,password)
            VALUES('$name','$username','$email','$useType','$image','$password')";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'user was inserted';
        to('users');
    } else {
        $_SESSION['error'] = 'there was a problems';
        to('add_user');
    }


}


?>


<div class="container-fluid">
    <div class="content">
        <h1><?= strtoupper($title) ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <?= Messages() ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="fomr-group">
                                    <label for="user_type">User Type</label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="image">Profile Picture</label>
                                    <input type="file" name="upload" class="btn btn-default">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="cpassword" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary">Add Record</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>