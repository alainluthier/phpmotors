<?php
//Accounts Controller
// Create or access a Session
session_start();    
// Get the database connection file
if(!isset($_SESSION['loggedin'])){
  header('Location: /phpmotors/');
}else if($_SESSION['loggedin']==FALSE){
  header('Location: /phpmotors/');
}else{
  if($_SESSION['clientData']['clientLevel']==1){
    header('Location: /phpmotors/');
  }
}
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

require_once '../model/vehicles-model.php';

// Get the functions library
require_once '../library/functions.php';

$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList=getNav($classifications);

$action = filter_input(INPUT_POST, 'action');
$method='POST';
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    $method="GET";
}
switch ($action) {
    case 'login':
        include '../view/login.php';
        break;
        case 'addClassification':
            if($method=='GET'){
              include '../view/add-classification.php';
              exit;
            }
            $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);
            if(empty($classificationName)){
              $message = '<p class="red">Please provide information for all empty form fields.</p>';
              include '../view/add-classification.php';
              exit;
            }
            
            $regOutcome = regClassification($classificationName);
            
            if($regOutcome === 1){
              $message = "";
              header("Refresh:0");
              exit;
            } else {
              $message = "<p class='red'>The registration failed. Please try again.</p>";
              include '../view/add-classification.php';
              exit;
            }
            break;
        case 'addVehicle':
              $classificationSelect = '';
              foreach ($classifications as $classification) {
                $classificationSelect .= "<option value='$classification[classificationId]'>$classification[classificationName] </option>";
              }

              if($method=='GET'){
                include '../view/add-vehicle.php';
                exit;
              }
              $carClassification = trim(filter_input(INPUT_POST, 'carClassification',FILTER_SANITIZE_STRING));
              $vehicleMake = trim(filter_input(INPUT_POST, 'vehicleMake',FILTER_SANITIZE_STRING));
              $vehicleModel = trim(filter_input(INPUT_POST, 'vehicleModel',FILTER_SANITIZE_STRING));
              $vehicleDescription = trim(filter_input(INPUT_POST, 'vehicleDescription',FILTER_SANITIZE_STRING));
              $vehicleImagePath = trim(filter_input(INPUT_POST, 'vehicleImagePath',FILTER_SANITIZE_STRING));
              $vehicleThumbnailPath = trim(filter_input(INPUT_POST, 'vehicleThumbnailPath',FILTER_SANITIZE_STRING));
              $vehiclePrice = trim(filter_input(INPUT_POST, 'vehiclePrice',FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION));
              $vehicleInStock = trim(filter_input(INPUT_POST, 'vehicleInStock',FILTER_SANITIZE_NUMBER_INT));
              $vehicleColor = trim(filter_input(INPUT_POST, 'vehicleColor',FILTER_SANITIZE_STRING));
              if($carClassification=='' || 
              empty($vehicleMake) || 
              empty($vehicleModel) || 
              empty($vehicleDescription) || 
              empty($vehicleImagePath) || 
              empty($vehicleThumbnailPath) || 
              empty($vehiclePrice) || 
              empty($vehicleInStock) || 
              empty($vehicleColor)
              ){
                $message = '<p class="red">Please provide information for all empty form fields.</p>';
                include '../view/add-vehicle.php';
                exit;
              }
              
              $regOutcome = regVehicle($carClassification,
              $vehicleMake,
              $vehicleModel,
              $vehicleDescription,
              $vehicleImagePath,
              $vehicleThumbnailPath,
              $vehiclePrice,
              $vehicleInStock,
              $vehicleColor);    
              if($regOutcome === 1){
                $message = "<p>The $vehicleMake $vehicleModel was added succsessfully!</p>";
                include '../view/add-vehicle.php';
                exit;
              } else {
                $message = "<p class='red'>The registration failed. Please try again.</p>";
                include '../view/add-vehicle.php';
                exit;
              }
              break;
    default:
        include '../view/vehicle-man.php';
        break;
}
