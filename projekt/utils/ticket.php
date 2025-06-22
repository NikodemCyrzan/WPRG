<?php

namespace Utils\Ticket;

function getStatusLabel($status)
{
    switch ($status) {
        case 0:
            return 'Open';
        case 1:
            return 'In Progress';
        case 2:
            return 'Closed';
        default:
            return 'Unknown';
    }
}

function getPriorityLabel($priority)
{
    switch ($priority) {
        case 0:
            return 'Low';
        case 1:
            return 'Medium';
        case 2:
            return 'High';
        default:
            return 'Unknown';
    }
}
