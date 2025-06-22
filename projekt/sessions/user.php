<?php

namespace Sessions\User;

require_once __DIR__ . '/../database/users.php';

$USER_ID = 'user_id';
$USER_USERNAME = 'user_username';
$USER_ROLE = 'user_role';

function getUser(): ?\Database\Users\User
{
    global $USER_ID, $USER_USERNAME, $USER_ROLE;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION[$USER_ID])) {
        return new \Database\Users\User(
            [
                'id' => $_SESSION[$USER_ID],
                'username' => $_SESSION[$USER_USERNAME],
                'role' => $_SESSION[$USER_ROLE],
                'team_id' => null
            ]
        );
    }

    return null;
}

function setUser($user)
{
    global $USER_ID, $USER_USERNAME, $USER_ROLE;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION[$USER_ID] = $user->id;
    $_SESSION[$USER_USERNAME] = $user->username;
    $_SESSION[$USER_ROLE] = $user->role;
}

function isLoggedIn(): bool
{
    global $USER_ID;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION[$USER_ID]);
}
