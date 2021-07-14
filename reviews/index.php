<?php
//Accounts Controller
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/reviews-model.php';

// Get the functions library
require_once '../library/functions.php';

$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = getNav($classifications);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
switch ($action) {
    case 'addReview':
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
        $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        if (empty($reviewText) || empty($invId) || empty($clientId)) {
            $_SESSION['message'] = '<p class="red">Please provide information for all empty form fields.</p>';
            header("Location: /phpmotors/vehicles?action=vehicle&invMake=".$invMake."&invModel=" . $invModel);
            exit;
        }
        unset($_SESSION['message']);
        $regOutcome = regReview(
            $reviewText,
            $invId,
            $clientId
        );
        header("Location: /phpmotors/vehicles?action=vehicle&invMake=".$invMake."&invModel=" . $invModel);
        break;
    case 'editReview':
        break;
    case 'updateReview':
        break;
    case 'confirmDeleteReview':
        break;
    case 'deleteReview':
        break;
    default:
        include '../view/vehicle-man.php';
        exit;
        break;
}
