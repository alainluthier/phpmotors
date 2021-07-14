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
    <title> | PHP Motors</title>
</head>

<body>
    <div id="container">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; ?>
        </nav>
        <main>
            <?php if (isset($vehicleDetailDisplay)) {
                echo $vehicleDetailDisplay;
            } ?>
        
        <hr>
        <h2>Customer Reviews</h2>
        <h2>Review The <?php echo $vehicle['invMake']." ".$vehicle['invModel'] ?></h2>
        <?php
            if (isset($message)) {
                echo $message;
            } ?>
        <?php
        if (!$_SESSION['loggedin']) {
            echo '<p>You must <a href="/phpmotors/accounts/?action=login">login</a> to write a review.</p>';
        } else{
           echo '
            <form action="/phpmotors/reviews/index.php" method="post" style="max-width: none">
                <div>
                    <label for="screenName">Screen Name</label>
                    <input type="text" name="screenName" id="screenName" value = "'.$screenName.'" disabled>
                </div>
                <div>
                    <label for="reviewText">Review</label>
                    <textarea class="txtarea" name="reviewText" id="reviewText" cols="30" rows="5"></textarea>
                </div>
                <input type="hidden" name="action" value="addReview">
                <input type="hidden" name="clientId" value="'.$vehicle['invId'].'">
                <input type="hidden" name="invId" value="'.$_SESSION['clientData']['clientId'].'">
                <button class="primary" type="submit">Submit Review</button>
            </form>
           '; 
        }?>
        <h3>Be the first to write a review.</h3>
        <div class="review">
            <h4><span>AUser</span> wrote on 17 March, 2020:</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis mollitia molestias sapiente, sequi reiciendis, nihil odit commodi architecto, qui a exercitationem corrupti non natus? Quis magni repellat laborum perspiciatis deserunt!</p>
        </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>

</html>