<?php
require_once __DIR__ . '/properties/ticket.php';
require_once __DIR__ . '/database/comments.php';
require_once __DIR__ . '/database/tickets.php';
require_once __DIR__ . '/database/teams.php';
require_once __DIR__ . '/database/users.php';
require_once __DIR__ . '/sessions/user.php';
require_once __DIR__ . '/utils/ticket.php';

$ticketId = \Properties\Ticket\getTicketId();

if ($ticketId === null) {
    http_response_code(400);
    echo "Ticket ID is required.";
    exit();
}

$ticket = \Database\Tickets\getTicketById($ticketId);

if ($ticket === null) {
    http_response_code(404);
    echo "Ticket not found.";
    exit();
}

$team = \Database\Teams\getTeamById($ticket->teamID);

$user = \Sessions\User\getUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <div class="header">
                <h1 class="title"><?php echo htmlspecialchars($ticket->title) ?></h1>
                <?php if ($ticket->status < 2) { ?>
                    <a href="/actions/set-ticket-status.php?ticket_id=<?php echo $ticket->id ?>&ticket_status=<?php echo $ticket->status + 1 ?>" class="button--rect ticket-status--<?php echo $ticket->status + 1 ?>">Set status: <?php echo \Utils\Ticket\getStatusLabel($ticket->status + 1) ?></a>
                <?php } ?>
            </div>
            <div class="groups">
                <div class="group ticket__details-grid">
                    <div class="ticket__detail">
                        <span class="ticket__label">ID:</span>
                        <span class="ticket__value"><?php echo $ticket->id ?></span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Status:</span>
                        <span class="ticket__value"><?php echo \Utils\Ticket\getStatusLabel($ticket->status) ?></span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Priority:</span>
                        <span class="ticket__value"><?php echo \Utils\Ticket\getPriorityLabel($ticket->priority) ?></span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Reporter:</span>
                        <span class="ticket__value">Someone</span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Assignee:</span>
                        <span class="ticket__value">
                            <?php if (\Sessions\User\isLoggedIn() && ($user->role === "admin" || $user->role === "team_owner")) { ?>
                                <select id="assign-user">
                                    <option disabled selected><?php echo $ticket->assigneeID !== null ? \Database\Users\getUserById($ticket->assigneeID)->username : "-- Assign someone --" ?></option>
                                    <?php
                                    $teamUsers = \Database\Users\getUsersByTeamId($team->id);
                                    foreach ($teamUsers as $user) {
                                        if ($ticket->assigneeID === $user->id) continue; ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
                                    <?php } ?>
                                </select>
                                <script>
                                    const assignUserEl = document.getElementById('assign-user');
                                    assignUserEl.addEventListener('change', () => {
                                        window.location = `/actions/assign-user.php?user_id=${assignUserEl.value}&ticket_id=<?php echo $ticketId ?>`;
                                    })
                                </script>
                            <?php } else if ($ticket->assigneeID !== null) {
                                echo \Database\Users\getUserById($ticket->assigneeID)->username;
                            } else echo "None" ?>
                        </span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Team:</span>
                        <span class="ticket__value link"><a href="/team.php?id=<?php echo $team->id ?>"><?php echo $team->name ?></a></span>
                    </div>
                    <div class="ticket__detail">
                        <span class="ticket__label">Created:</span>
                        <span class="ticket__value"><?php echo date('Y-m-d H:i', $ticket->createTimestamp) ?></span>
                    </div>
                    <?php if ($ticket->endTimestamp !== null) { ?>
                        <div class="ticket__detail">
                            <span class="ticket__label">Closed:</span>
                            <span class="ticket__value"><?php echo date('Y-m-d H:i', $ticket->endTimestamp) ?></span>
                        </div>
                    <?php } else { ?>
                        <div class="ticket__detail">
                            <span class="ticket__label">Complete until:</span>
                            <span class="ticket__value"><?php echo date('Y-m-d', $ticket->deadlineTimestamp) ?></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="group ticket__description">
                    <?php echo nl2br(htmlspecialchars($ticket->description)) ?>
                </div>
                <div class="group">
                    <h2 class="title--nm">Comments</h2>
                    <?php if (\Sessions\User\isLoggedIn()) { ?>
                        <div class="comments__create">
                            <form action="/actions/create-comment.php" method="post">
                                <textarea id="commentContent" rows="4" placeholder="Write comment"></textarea>
                                <input type="hidden" name="author_id" value="<?php echo $user->id ?>">
                                <input type="hidden" name="ticket_id" value="<?php echo $ticketId ?>">
                                <p>
                                    <input type="submit" value="Send" class="button--rect button--secondary">
                                </p>
                            </form>
                        </div>
                    <?php } ?>
                    <div class="comments__list">
                        <?php
                        $comments = \Database\Comments\getAllCommentsByTicketId($ticketId);
                        foreach ($comments as $comment) {
                            $author = \Database\Users\getUserById($comment->authorID);
                        ?>
                            <div class="comment">
                                <h3 class="comment__author">
                                    <?php echo $author->username ?>
                                </h3>
                                <?php if ($user->role === "admin") { ?>
                                    <a href="" class="comment__delete link">Delete comment</a>
                                <?php } ?>
                                <?php echo nl2br(htmlspecialchars($comment->content)); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>