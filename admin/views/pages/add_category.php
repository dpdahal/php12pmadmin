<?php

if (!empty($_POST)  && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['cat_name'];

    $query = "INSERT INTO tbl_image_category(cat_name)
            VALUES('$catName')";
    $result = mysqli_query($conn, $query);
    if ($result == true) {
        $_SESSION['success'] = 'category  was inserted';
        to('add_category');
    } else {
        $_SESSION['error'] = 'there was a problems';
        to('add_category');
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
                <form action="" method="post">

                        <div class="form-group">
                            <label for="cat">Category Name</label>
                            <input type="text" name="cat_name" id="name" class="form-control">
                        </div>



                    <div class="col-md-12">
                        <button class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>