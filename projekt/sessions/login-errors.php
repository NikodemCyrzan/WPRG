<?php

namespace Sessions\LoginErrors;

$LOGIN_ERRORS = 'login_errors';

function getLoginErrors(): array
{
    global $LOGIN_ERRORS;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return $_SESSION[$LOGIN_ERRORS] ?? [];
}

function setLoginErrors(array $errors): void
{
    global $LOGIN_ERRORS;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION[$LOGIN_ERRORS] = $errors;
}

function areLoginErrors(): bool
{
    global $LOGIN_ERRORS;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION[$LOGIN_ERRORS]) && !empty($_SESSION[$LOGIN_ERRORS]);
}

function clearLoginErrors(): void
{
    global $LOGIN_ERRORS;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION[$LOGIN_ERRORS]);
}
