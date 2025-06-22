<?php

namespace Properties\DeleteComment;

function getCommentId(): ?string
{
    return isset($_GET['comment_id']) ? trim($_GET['comment_id']) : null;
}

function getTicketId(): ?string
{
    return isset($_GET['ticket_id']) ? trim($_GET['ticket_id']) : null;
}
