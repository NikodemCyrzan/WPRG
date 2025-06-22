<?php

namespace Actions\Login;

require_once __DIR__ . '/../../sessions/login-errors.php';

function getUsername()
{
    return isset($_POST['username']) ? trim($_POST['username']) : null;
}

function getPassword()
{
    return isset($_POST['password']) ? $_POST['password'] : null;
}

function findErrors()
{
    $errors = [];

    $username = getUsername();
    $password = getPassword();

    if (empty($username)) {
        $errors[] = 'Username is required.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    return $errors;
}

function returnLoginErrors($errors)
{
    \Sessions\LoginErrors\setLoginErrors($errors);

    header('Location: /login.php');
    exit();
}
