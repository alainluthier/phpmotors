<?php
function regReview(
    $reviewId,
    $reviewText,
    $reviewDate,
    $invId,
    $clientId
) {
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO reviews (reviewId,reviewText,reviewDate,invId,clientId)
        VALUES (:reviewId,:reviewText,:reviewDate,:invId,:clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT;
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
// Get vehicles by classificationId 
function getInventoryByClassification($classificationId)
{
    $db = phpmotorsConnect();
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    $stmt->execute();
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $inventory;
}
// Get vehicle information by invId
function getInvItemInfo($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
// Update a vehicle
function updateVehicle(
    $invMake,
    $invModel,
    $invDescription,
    $invImage,
    $invThumbnail,
    $invPrice,
    $invStock,
    $invColor,
    $classificationId,
    $invId
) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE inventory SET invMake = :invMake, invModel = :invModel, invDescription = :invDescription, invImage = :invImage, invThumbnail = :invThumbnail, invPrice = :invPrice, invStock = :invStock, invColor = :invColor, classificationId = :classificationId WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function deleteVehicle($invId)
{
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function getVehiclesByClassification($classificationName)
{
    $db = phpmotorsConnect();
    $sql = "SELECT i.invId, i.invMake, i.invModel, i.invDescription, 
	im.imgPath invThumbnail,
    i.invPrice, i.invStock, i.invColor, i.classificationId 
    FROM inventory i INNER JOIN images im ON i.invId=im.invId
    WHERE classificationId 
    IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName) 
    AND im.imgPrimary=1
    AND im.imgPath like '%-tn.%'";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}
function getVehicle($invMake, $invModel)
{
    $db = phpmotorsConnect();
    $sql = "
    SELECT i.invId, i.invMake, i.invModel, i.invDescription, 
	im.imgPath invImage, 
    i.invPrice, i.invStock, i.invColor, i.classificationId  
    FROM inventory i INNER JOIN images im ON i.invId=im.invId 
    WHERE i.invMake=:invMake AND i.invModel=:invModel 
    ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
function getVehicles()
{
    $db = phpmotorsConnect();
    $sql = 'SELECT invId, invMake, invModel FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
function getVehicleThumbnail($invId)
{
    $db = phpmotorsConnect();
    $sql = "SELECT i.invId, i.invMake, i.invModel, i.invDescription, 
	im.imgPath invThumbnail, im.imgName,
    i.invPrice, i.invStock, i.invColor, i.classificationId 
    FROM inventory i INNER JOIN images im ON i.invId=im.invId
    WHERE im.imgPath like '%-tn.%'
    and i.invId=:invId";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;
}
