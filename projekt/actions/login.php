<?php
require_once  __DIR__ . "/../database/users.php";
require_once __DIR__ . "/../sessions/user.php";
require_once __DIR__ . "/login/index.php";

$errors = \Actions\Login\findErrors();

if (!empty($errors)) {
    \Actions\Login\returnLoginErrors($errors);
}

$user = \Database\Users\getUserWithCredentials(
    \Actions\Login\getUsername(),
    \Actions\Login\getPassword(),
);

if ($user === null) {
    array_push($errors, 'Invalid username or password.');
    \Actions\Login\returnLoginErrors($errors);
}

\Sessions\User\setUser($user);

header('Location: /index.php');
exit();
