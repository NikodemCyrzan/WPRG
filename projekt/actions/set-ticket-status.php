<?php
require_once __DIR__ . "/../properties/set-ticket-status.php";
require_once __DIR__ . "/../database/tickets.php";
require_once __DIR__ . "/../sessions/user.php";

$ticketId = \Properties\SetTicketStatus\getTicketId();
$ticketStatus = \Properties\SetTicketStatus\getNewStatus();

if (!\Sessions\User\isLoggedIn()) {
    header("Location: /ticket.php?id=$ticketId");
    exit();
}

// \Database\Tickets\setTicketStatus($ticketId, $ticketStatus);

header("Location: /ticket.php?id=$ticketId");
exit();
