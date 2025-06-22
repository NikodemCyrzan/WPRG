<?php

require_once __DIR__ . '/../sessions/user.php';
require_once __DIR__ . '/../database/tickets.php';
require_once __DIR__ . '/../properties/create-ticket.php';

if (!\Sessions\User\isLoggedIn()) {
    header('Location: /login.php');
    exit();
}

$title = \Properties\CreateTicket\getTitle();
$desc = \Properties\CreateTicket\getDescription();
$priority = \Properties\CreateTicket\getPriority();
$teamId = \Properties\CreateTicket\getTeamId();
$reporterId = \Sessions\User\getUser()->id;

// $id = \Database\Tickets\createTicket($title, $desc, $priority, $teamId, $reporterId);;

header('Location: /ticket.php?id=0');
exit();
