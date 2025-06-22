<?php

namespace Properties\AssignUser;

function getUserId(): ?int
{
    return isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
}

function getTicketId(): ?int
{
    return isset($_GET['ticket_id']) ? (int)$_GET['ticket_id'] : null;
}
