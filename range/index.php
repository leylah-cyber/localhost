<?php 
// filepath: ./range/index.php
$localhost = $_SERVER['REQUEST_URI'];

switch ($localhost) {
    case '/phpinfo':
        // phpinfo();
        break;
    case '/contact':
        // echo "GEOINT REF:9283";
        break;
    default:
        echo "Home page";
        break;
}

?>

