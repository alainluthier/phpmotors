<?php
function regVehicle(
    $carClassification,
$vehicleName, 
$vehicleModel, 
$vehicleDescription, 
$vehicleImagePath, 
$vehicleThumbnailPath, 
$vehiclePrice, 
$vehicleInStock, 
$vehicleColor){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO inventory (invMake,invModel,invDescription,invImage,invThumbnail,invPrice,invStock,invColor,
    classificationId)
        VALUES (:invMake,:invModel,:invDescription,:invImage,:invThumbnail,:invPrice,:invStock,:invColor,
    :classificationId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invMake', $vehicleName, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $vehicleModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $vehicleDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $vehicleImagePath, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $vehicleThumbnailPath, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $vehiclePrice, PDO::PARAM_INT);
    $stmt->bindValue(':invStock', $vehicleInStock, PDO::PARAM_INT);
    $stmt->bindValue(':invColor', $vehicleColor, PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $carClassification, PDO::PARAM_INT);
    
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function regClassification($classificationName){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO carclassification (classificationName)
        VALUES (:classificationName)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
