<?php
require_once __DIR__ . '/sessions/user.php';
require_once __DIR__ . '/database/tickets.php';
require_once __DIR__ . '/utils/ticket.php';

$user = \Sessions\User\getUser();
$isLoggedIn = \Sessions\User\isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <div class="header">
                <h1 class="title">Hello<?php echo $isLoggedIn ? ", $user->username" : "" ?>!</h1>
                <a href="/team.php?id=<?php echo $user->teamID ?>" class="button--rect button--secondary">Your team</a>
            </div>
            <div class="groups">
                <?php if ($isLoggedIn) { ?>
                    <div class="group">
                        <h2 class="title--nm">Your tickets for today</h2>
                        <?php
                        $userTickets = \Database\Tickets\getTicketsByAssigneeId($user->id);

                        if (count($userTickets) <= 0) {
                        ?>
                            <p>You have no tickets assigned for today.</p>
                        <?php } else { ?>
                            <div class="tickets-list">
                                <?php foreach ($userTickets as $ticket) { ?>
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
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>