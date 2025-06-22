<?php
require_once __DIR__ . '/sessions/user.php';
require_once __DIR__ . '/database/teams.php';
require_once __DIR__ . '/database/tickets.php';
require_once __DIR__ . '/properties/team.php';
require_once __DIR__ . '/utils/ticket.php';

$user = \Sessions\User\getUser();
$isLoggedIn = \Sessions\User\isLoggedIn();

$teamID = \Properties\Team\getTeamId();

if ($teamID === null) {
    http_response_code(400);
    echo "Tea, ID is required.";
    exit();
}

$team = \Database\Teams\getTeamById($teamID);

if ($team === null) {
    http_response_code(404);
    echo "Team not found.";
    exit();
}

$teamUsers = \Database\Users\getUsersByTeamId($teamID);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php ?></title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <h1 class="title"><?php echo $team->name ?></h1>
            <div class="groups">
                <div class="group">
                    <h2 class="title--nm">
                        Tickets
                    </h2>
                    <div class="tickets-list">
                        <?php foreach ($teamUsers as $user) { ?>
                            <div class="tickets-list__group">
                                <h3 class="tickets-list__group-header">
                                    <?php echo $user->username ?>
                                </h3>
                                <div class="tickets-list__padding">
                                    <?php
                                    $userTickets = \Database\Tickets\getTicketsByAssigneeId($user->id);

                                    if (count($userTickets) <= 0) { ?>
                                        <p>User has no tickets assigned for today.</p>
                                        <?php
                                    } else {
                                        foreach ($userTickets as $ticket) { ?>
                                            <a class="tickets-list__item" href="ticket.php?id=<?php echo $ticket->id; ?>">
                                                <span class="tickets-list__item--left">
                                                    <h3 class="ticket__title">
                                                        <?php echo htmlspecialchars($ticket->title) ?>
                                                    </h3>
                                                    <div class="tickets-list__status ticket-status--<?php echo $ticket->status ?>"><?php echo \Utils\Ticket\getStatusLabel($ticket->status) ?></div>
                                                </span>
                                                <p class="ticket__priority">Priority: <span class="ticket__value">
                                                        <?php echo \Utils\Ticket\getPriorityLabel($ticket->priority); ?>
                                                    </span></p>
                                            </a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="group">
                    <h2 class="title--nm">
                        Backlog
                    </h2>
                    <?php
                    $tickets = \Database\Tickets\getUnassignedTicketsByTeamId($team->id);

                    if (count($tickets) <= 0) {
                    ?>
                        <p>There are no tickets in backlog.</p>
                    <?php } else { ?>
                        <div class="tickets-list">
                            <?php foreach ($tickets as $ticket) { ?>
                                <a class="tickets-list__item" href="ticket.php?id=<?php echo $ticket->id; ?>">
                                    <span class="tickets-list__item--left">
                                        <h3 class="ticket__title">
                                            <?php echo htmlspecialchars($ticket->title); ?>
                                        </h3>
                                        <div class="tickets-list__status ticket-status--<?php echo $ticket->status ?>"><?php echo \Utils\Ticket\getStatusLabel($ticket->status) ?></div>
                                    </span>
                                    <p class="ticket__priority">Priority: <span class="ticket__value">
                                            <?php echo \Utils\Ticket\getPriorityLabel($ticket->priority); ?>
                                        </span>
                                    </p>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>