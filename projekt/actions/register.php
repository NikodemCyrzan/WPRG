<?php
require_once  __DIR__ . "/../database/users.php";
require_once __DIR__ . "/../sessions/user.php";
require_once __DIR__ . "/login/index.php";

$errors = \Actions\Register\findErrors();

if (!empty($errors)) {
    \Actions\Register\returnLoginErrors($errors);
}

$user = \Database\Users\getUserWithUsername(
    \Actions\Register\getUsername(),
);

if ($user !== null) {
    array_push($errors, "User already exists.");
    \Actions\Register\returnLoginErrors($errors);
}

\Database\Users\createUser(
    \Actions\Register\getUsername(),
    \Actions\Register\getPassword(),
);

$user = \Database\Users\getUserWithCredentials(
    \Actions\Register\getUsername(),
    \Actions\Register\getPassword(),
);

\Sessions\User\setUser($user);

header('Location: /index.php');
exit();
