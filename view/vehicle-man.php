<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/phpmotors/css/normalize.css" rel="stylesheet">
    <link href="/phpmotors/css/small.css" rel="stylesheet">
    <link href="/phpmotors/css/medium.css" rel="stylesheet">
    <link href="/phpmotors/css/large.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet"> 
    <title>PHP Motors | Vehicule Management</title>
</head>
<body>
    <div id="container">
    <header> 
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/header.php';?>
    </header>
    <nav>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/nav.php';?>
    </nav>
    <main>
        <h1>Vehicle Management</h1>
        <ul>
            <li><a href="/phpmotors/vehicles/index.php?action=<?php echo urlencode('addClassification')?>">Add Classification</a></li>
            <li><a href="/phpmotors/vehicles/index.php?action=<?php echo urlencode('addVehicle')?>">Add Vehicle</a></li>
        </ul>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/common/footer.php';?>
    </footer>
    </div>
</body>
</html>