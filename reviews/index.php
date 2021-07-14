<?php
//Review Controller
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicles-model.php';

// Get the functions library
require_once '../library/functions.php';

$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = getNav($classifications);

$action = filter_input(INPUT_POST, 'action');
$method = 'POST';
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    $method = "GET";
}
switch ($action) {
    case 'addReview':
        break;
    case 'getReview':
        break;
    case 'editReview':
        break;
    case 'deleteReview':
        break;
    default:
        include '../view/admin.php';
        break;
}
