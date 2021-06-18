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
    <title>Account Managment | PHP Motors</title>
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
            <h1>Manage Accout</h1>
            <h3>Update Account</h3>
            <form action="/phpmotors/accounts" method="POST">
                <div>
                    <label for="firstName">First Name</label>
                    <input type="text" name="clientFirstname">
                </div>

                <div>
                    <label for="firstName">First Name</label>
                    <input type="text" name="clientLastname">
                </div>
                <div>
                    <label for="firstName">Email</label>
                    <input type="email" name="clientEmail">
                </div>
                <input type="hidden" name="action" value="updateClient">
                <button class= "primary" type="submit">Update Info</button>
            </form>
            <h3>Update Password</h3>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> <br>
            <span>*note your original password will be changed</span>
            <br>
            <br>
            <form action="/phpmotors/accounts" method="POST">
                <div>
                    <label for="password">Password</label>
                    <input type="hidden" name="action" value="updatePassword">
                    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                </div>
            </form>

        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>

</html>