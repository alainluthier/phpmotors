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
    <title>PHP Motors | Register</title>
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
            <h1>Register</h1>
            <form action="">
                <div>
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div>
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="button" class="show-password">Show Password</button>
                <button type="submit"  class="primary">Register</button>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>

</html>