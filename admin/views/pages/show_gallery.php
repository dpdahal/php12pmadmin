<?php
$userId = $_SESSION['user_id'];
$query = "SELECT tbl_gallery.*,tbl_image_category.cat_name,tbl_users.username FROM tbl_gallery
JOIN tbl_users ON tbl_gallery.user_id=tbl_users.uid
JOIN tbl_image_category ON tbl_gallery.cat_id=tbl_image_category.id WHERE tbl_users.uid='$userId' ";
$galleryResult = mysqli_query($conn, $query);


?>

<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h1><?= strtoupper($title) ?></h1>
                <hr>
                <?php foreach ($galleryResult as $gallery) : ?>
                    <div class="col-md-4">
                        <img src="<?= BASE_URL . 'public/images/gallery/' . $gallery['image_name'] ?>"
                             alt="image not found" class="img-responsive thumbnail">
                        <br>
                        <a href="" class="btn btn-info btn-xs">Category <?= $gallery['cat_name'] ?></a>
                        <a href="" class="btn btn-primary btn-xs">Posted By <?= $gallery['username'] ?></a>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>