<?php
// require configuration file here
require_once ('configuration/configuration.php');
$urlPage=isset($_GET['url'])? $_GET['url'] : 'home';
$title=$urlPage;
$urlPage=$urlPage.'.php';
?>

<?php
/*
 *required header file
 */

require_once (ROOT.'views/layouts/header.php');

?>


<?php
$pagePath=ROOT.'views/pages/'.$urlPage;

if(file_exists($pagePath) && isset($pagePath)){
    require_once (ROOT.'views/layouts/nav.php');
   require_once $pagePath;
}else {
   require_once (ROOT.'messages/errors/404.php');
}

?>

<?php
/*
 *required footer file
 */

require_once (ROOT.'views/layouts/footer.php');

?>





