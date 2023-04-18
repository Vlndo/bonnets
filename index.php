<?php
ob_start();
$page = 'home';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

require_once 'includes/header.php';

include 'pages/' . $page . '.php';

require_once 'includes/footer.php';
ob_end_flush();
?>