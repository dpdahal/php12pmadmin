<?php

$catQuery = "select * from tbl_news_category";
$catResult = mysqli_query($conn, $catQuery);


if (!empty($_POST) && !empty($_FILES) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $catId = $_POST['cat_name'];
    $userId = $_SESSION['user_id'];

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
    $imageName = md5(microtime()) . '.' . $ext;
    $tmpName = $_FILES['upload']['tmp_name'];
    $error = $_FILES['upload']['error'];
    $imageExt = ['jpg', 'jpeg', 'png', 'gif'];
    $uploadPath = ROOT . 'public/images/news/';
    if ($error == 0) {
        if (in_array($ext, $imageExt)) {
            if (move_uploaded_file($tmpName, $uploadPath . $imageName)) {
                $image = $imageName;
            } else {
                $_SESSION['error'] = 'there was a problems';
                to('add_news');
            }
        }

    } else {
        $_SESSION['error'] = 'image format must be' . implode(',', $imageExt);
        to('add_news');
    }

    $query = "INSERT INTO tbl_news(title,image_name,description)
            VALUES('$title','$image','$desc')";
    $result = mysqli_query($conn, $query);
    $lastInsertId = mysqli_insert_id($conn);
    if ($lastInsertId) {
        $sql = "INSERT INTO tbl_category(news_id,cat_id,user_id)
            VALUES('$lastInsertId','$catId','$userId')";
        $res = mysqli_query($conn, $sql);
        if ($result == true) {
            $_SESSION['success'] = 'news was inserted';
            to('add_news');
        } else {
            $_SESSION['error'] = 'news was a problems';
            to('add_news');
        }

    }


}


?>


<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><?= strtoupper($title) ?></h1>
                <hr>
                <?= Messages() ?>
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
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" name="upload" id="image" class="btn btn-default">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Add News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
