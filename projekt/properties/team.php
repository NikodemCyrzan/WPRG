<?php

namespace Properties\Team;

function getTeamId(): ?int
{
    return isset($_GET['id']) ? (int)$_GET['id'] : null;
}
