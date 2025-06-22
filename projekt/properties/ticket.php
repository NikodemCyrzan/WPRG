<?php

namespace Properties\Ticket;

function getTicketId(): ?int
{
    return isset($_GET['id']) ? (int)$_GET['id'] : null;
}
