<?php
require_once __DIR__ . '/sessions/login-errors.php';

if (\Sessions\LoginErrors\areLoginErrors()) {
    $errors = \Sessions\LoginErrors\getLoginErrors();
    \Sessions\LoginErrors\clearLoginErrors();
} else {
    $errors = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <div class="header">
                <h1 class="title">Register</h1>
            </div>
            <div class="groups">
                <div class="group">
                    <form class="form" action="./actions/register.php" method="post">
                        <div class="form__input-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form__input-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form__input-group">
                            <label for="password2">Repeat Password</label>
                            <input type="password" id="password2" name="password2">
                        </div>
                        <span>
                            <input type="submit" name="submit" value="Login" class="button--secondary">
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>