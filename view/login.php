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
    <title>PHP Motors | Login</title>
</head>

<body>
    <div id="container">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; ?>
        </nav>
        <main class="login">
            <h1>Sign In</h1>
            <form action="">
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit" class="primary">Sign-in</button>
                <a href="/phpmotors/accounts/index.php?action=<?php echo urlencode('register') ?>">Not a member yet?</a>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>

</html>