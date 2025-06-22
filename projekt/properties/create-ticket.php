<?php

namespace Properties\CreateTicket;

function getTitle(): ?string
{
    return isset($_POST['title']) ? trim($_POST['title']) : null;
}

function getDescription(): ?string
{
    return isset($_POST['description']) ? trim($_POST['description']) : null;
}

function getPriority(): ?int
{
    return isset($_POST['priority']) ? trim($_POST['priority']) : null;
}

function getTeamId(): ?int
{
    return isset($_POST['team']) ? trim($_POST['team']) : null;
}
