<?php
$squer="SELECT tbl_news.*,tbl_news_category.cat_name,tbl_users.username FROM tbl_news
JOIN tbl_category ON tbl_category.news_id=tbl_news.id
JOIN tbl_news_category ON tbl_category.cat_id=tbl_news_category.id
JOIN tbl_users ON tbl_category.user_id=tbl_users.uid";

$news=mysqli_query($conn,$squer);

?>


<div class="container-fluid">
    <div class="content">
        <h1><?= strtoupper($title) ?></h1>
        <hr>
        <?= Messages() ?>

        <table class="table table-hover">
            <tr>
                <th>S.N</th>
                <th>title</th>
                <th>Category Name</th>
                <th>Posted By</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php foreach ($news as $key => $user) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $user['title'] ?></td>
                    <td><?= $user['cat_name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><img src="<?= BASE_URL . 'public/images/news/' . $user['image_name'] ?>" data-action="zoom" alt="image not found"
                             width="30"></td>
                    <td>
                        <a href="" class="btn btn-primary btn-xs">Edit</a>
                        <a href="" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

    </div>

</div>





