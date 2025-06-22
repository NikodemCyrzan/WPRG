<?php
require_once __DIR__ . "/../properties/assign-user.php";
require_once __DIR__ . "/../database/tickets.php";
require_once __DIR__ . "/../sessions/user.php";

$ticketId = \Properties\AssignUser\getTicketId();
$userId = \Properties\AssignUser\getUserId();


if (!\Sessions\User\isLoggedIn()) {
    header("Location: /ticket.php?id=$ticketId");
    exit();
}

$role = \Sessions\User\getUser()->role;
if (($role !== "admin" && $role !== "team_owner")) {
    header("Location: /ticket.php?id=$ticketId");
    exit();
}

// \Database\Tickets\setTicketAssignee($ticketId, $userId);

header("Location: /ticket.php?id=$ticketId");
exit();
