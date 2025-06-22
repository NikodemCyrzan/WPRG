<?php

namespace Properties\SetTicketStatus;

function getTicketId(): ?int
{
    return isset($_GET['ticket_id']) ? (int)$_GET['ticket_id'] : null;
}


function getNewStatus(): ?int
{
    return isset($_GET['ticket_status']) ? (int)$_GET['ticket_status'] : null;
}
