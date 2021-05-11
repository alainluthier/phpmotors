<?php
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'something':
        break;
    default:
        echo 'test';
        include 'view/home.php';
}
