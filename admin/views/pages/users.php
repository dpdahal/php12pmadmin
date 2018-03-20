<?php

$query = "SELECT * FROM tbl_users ORDER BY uid DESC ";
$userResult = mysqli_query($conn, $query);

if (isset($_POST['admin'])) {
    $userId = $_POST['user_id'];
    $userType = 'user';
    $sql = "UPDATE tbl_users SET user_type='$userType' WHERE uid=" . $userId;
    $updateStatus = mysqli_query($conn, $sql);
    if ($updateStatus == true) {
        $_SESSION['success'] = 'user was user';
        to('users');
    }


}

if (isset($_POST['user'])) {
    $userId = $_POST['user_id'];
    $userType = 'admin';
    $sql = "UPDATE tbl_users SET user_type='$userType' WHERE uid=" . $userId;
    $updateStatus = mysqli_query($conn, $sql);
    if ($updateStatus == true) {
        $_SESSION['success'] = 'user was admin';
        to('users');
    }

}


?>

<div class="container-fluid">
    <div class="content">
        <h1><?= strtoupper($title) ?></h1>
        <hr>
        <?= Messages() ?>

        <table class="table table-hover">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php foreach ($userResult as $key => $user) : ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?= $user['uid'] ?>">
                            <?php if ($user['user_type'] == 'admin') : ?>
                                <button name="admin" class="btn btn-success btn-xs">Admin</button>
                            <?php else: ?>
                                <button name="user" class="btn btn-info btn-xs">User</button>
                            <?php endif; ?>
                        </form>
                    </td>
                    <td><img src="<?= BASE_URL . 'public/images/userimages/' . $user['image'] ?>" data-action="zoom" alt="image not found"
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