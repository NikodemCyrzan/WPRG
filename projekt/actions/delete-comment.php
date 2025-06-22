<?php

require_once __DIR__ . '/../sessions/user.php';
require_once __DIR__ . '/../database/comments.php';
require_once __DIR__ . '/../properties/delete-comment.php';


if (!\Sessions\User\isLoggedIn()) {
    header('Location: /login.php');
    exit();
}

$role = \Sessions\User\getUser()->role;
if ($role !== "admin") {
    header('Location: /login.php');
    exit();
}

$commentId = \Properties\DeleteComment\getCommentId();
$ticketId = \Properties\DeleteComment\getTicketId();

// $id = \Database\Comments\deleteComment($commentId);

header("Location: /ticket.php?id=$ticketId");
exit();
