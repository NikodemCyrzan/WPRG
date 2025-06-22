<?php

require_once __DIR__ . '/../sessions/user.php';
require_once __DIR__ . '/../database/comments.php';
require_once __DIR__ . '/../properties/create-comment.php';

if (!\Sessions\User\isLoggedIn()) {
    header('Location: /login.php');
    exit();
}

$authorId = \Properties\CreateComment\getAuthorId();
$ticketId = \Properties\CreateComment\getTicketId();
$content = \Properties\CreateComment\getContent();

// $id = \Database\Comments\createComment($authorId, $ticketId, $content);

header("Location: /ticket.php?id=$ticketId");
exit();
