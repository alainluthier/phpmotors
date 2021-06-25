<?php
function checkEmail($clientEmail)
{
  $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword)
{
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
  return preg_match($pattern, $clientPassword);
}
function getNav($classifications)
{
  $navList = '<ul>';
  $navList .= "<li><a href='/phpmotors/' title='View the PHP Motors home page'>Home</a></li>";
  foreach ($classifications as $classification) {
    $navList .= "<li>
    <a href='/phpmotors/vehicles/?action=classification&classificationName="
      . urlencode($classification['classificationName']) .
      "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a>
    </li>";
  }
  $navList .= '</ul>';
  return $navList;
}
// Build the classifications select list 
function buildClassificationList($classifications)
{
  $classificationList = '<select name="classificationId" id="classificationList">';
  $classificationList .= "<option>Choose a Classification</option>";
  foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
  }
  $classificationList .= '</select>';
  return $classificationList;
}
function buildVehiclesDisplay($vehicles)
{
  $dv = '<ul id="inv-display">';
  foreach ($vehicles as $vehicle) {
    $dv .= '<li>';
    $dv .= "<a href='/phpmotors/vehicles?action=vehicle&invMake" . urlencode($vehicle['invMake']) . "&invModel=" . urlencode($vehicle['invModel']) . "'>";
    $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
    $dv .= '</a>';
    $dv .= '<hr>';
    $dv .= "<a href='/phpmotors/vehicles?action=vehicle&invMake" . urlencode($vehicle['invMake']) . "&invModel=" . urlencode($vehicle['invModel']) . "'>";
    $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
    $dv .= '</a>';
    $dv .= "<span>$vehicle[invPrice]</span>";
    $dv .= '</li>';
  }
  $dv .= '</ul>';
  return $dv;
}
function buildVehicleDetailDisplay($vehicle)
{
  $dv = '<h1>$vehicle[] Truck</h1>';
  $dv .= '<div class="vehicle-detail">';
  $dv .= '  <div>';
  $dv .= "    <img src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel]'>";
  $dv .= "    <p><span>Price: $vehicle[invPrice]</span></p>";
  $dv .= '  </div>';
  $dv .= '  <div>';
  $dv .= "    <h2>$vehicle[invMake] $vehicle[invModel] Details</h2>";
  $dv .= "    <p class='gray'>$vehicle[invDescription]</p>";
  $dv .= "    <p><span>Color:</span>$vehicle[invColor]</p>";
  $dv .= "    <p class='gray'><span># in Stock:$vehicle[invStock]</span></p>";
  $dv .= '  </div>';
  $dv .= '</div>';
  return $dv;
}
