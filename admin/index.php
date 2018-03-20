<?php
// require configuration file here
require_once('../configuration/configuration.php');
// require database connection file
require_once('../connection/connection.php');
// required system file
require_once(ROOT . 'system/redirect.php');
require_once(ROOT . 'connection/message.php');

$urlPage = isset($_GET['url']) ? $_GET['url'] : 'dashboard';
$title = $urlPage;
$urlPage = $urlPage . '.php';

if (!isset($_SESSION['user_name']) || $_SESSION['is_log_in'] != TRUE) {
    header('Location:http://www.php12pm.com/admin/login/');
    exit();
}


?>

<?php
/*
 *required header file
 */

require_once(ROOT . 'admin/views/layouts/header.php');

?>


<?php
$pagePath = ROOT . 'admin/views/pages/' . $urlPage;

if (file_exists($pagePath) && isset($pagePath)) {
    require_once(ROOT . 'admin/views/layouts/top_time.php');
    require_once(ROOT . 'admin/views/layouts/nav.php');
    require_once $pagePath;
} else {
    require_once(ROOT . 'messages/errors/404.php');
}

?>

<?php
/*
 *required footer file
 */

require_once(ROOT . 'admin/views/layouts/footer.php');

?>





