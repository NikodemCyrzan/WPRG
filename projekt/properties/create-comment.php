<?php

namespace Properties\CreateComment;

function getAuthorId(): ?int
{
    return isset($_POST['author_id']) ? (int)trim($_POST['author_id']) : null;
}

function getTicketId(): ?int
{
    return isset($_POST['ticket_id']) ? (int)trim($_POST['ticket_id']) : null;
}

function getContent(): ?string
{
    return isset($_POST['content']) ? trim($_POST['content']) : null;
}
