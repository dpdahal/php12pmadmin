<?php

$catQuery = "select * from tbl_image_category";
$catResult = mysqli_query($conn, $catQuery);


if (!empty($_POST) && !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $catId = $_POST['cat_name'];
    $userId = $_SESSION['user_id'];
    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $ext;
    $tmpName = $_FILES['upload']['tmp_name'];
    $error = $_FILES['upload']['error'];
    $imageExt = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadPath = ROOT . 'public/images/gallery/';
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

    $query = "INSERT INTO tbl_gallery(image_name,cat_id,user_id)
            VALUES('$image','$catId','$userId')";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'image was inserted';
        to('add_gallery');
    } else {
        $_SESSION['error'] = 'there was a problems';
        to('add_gallery');
    }


}


?>


<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><?= strtoupper($title) ?></h1>
                <hr>
                <?=Messages()?>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="cat">Select Category</label>
                    <select name="cat_name" id="cat" class="form-control">
                        <?php foreach ($catResult as $cat) : ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['cat_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Select Image</label>
                    <input type="file" name="upload" id="image" class="btn btn-default">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Add Image</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
