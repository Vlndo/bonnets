<?php
require_once 'includes/header.php';
session_destroy();
header("Location: index.php?page=home");
require_once 'includes/footer.php';
?>