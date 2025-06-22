<?php
require_once __DIR__ . '/sessions/user.php';
require_once __DIR__ . '/database/teams.php';
require_once __DIR__ . '/utils/ticket.php';

$isLoggedIn = \Sessions\User\isLoggedIn();
$user = \Sessions\User\getUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <div class="header">
                <h1 class="title">Create new ticket</h1>
            </div>
            <div class="groups">
                <div class="group">
                    <form class="form" action="/actions/create-ticket.php" method="post">
                        <div class="form__input-group">
                            <?php if ($user->role === 'admin') { ?>
                                <label for="team">Team</label>
                                <select name="team" id="team" required>
                                    <option value="null" selected disabled>-- choose team --</option>
                                    <?php foreach (\Database\Teams\getAllTeams() as $team) { ?>
                                        <option value="<?php echo $team->id ?>"><?php echo $team->name ?></option>
                                    <?php } ?>
                                </select>
                            <?php } else if ($user->role === 'team_owner' || $user->role === 'user') {
                                $team = \Database\Teams\getTeamById($user->teamID);
                            ?>
                                <label for="team">Team</label>
                                <input type="text" id="team" value="<?php echo $team->id ?>" hidden>
                                <input type="text" value="<?php echo $team->name ?>" readonly>
                            <?php } ?>
                        </div>
                        <div class="form__input-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" required>
                        </div>
                        <div class="form__input-group">
                            <label for="description">Description (optional)</label>
                            <textarea name="description" id="description" rows="6"></textarea>
                        </div>
                        <div class="form__input-group">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" required>
                                <option value="null" selected disabled>-- choose priority --</option>
                                <?php for ($i = 0; $i < 3; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo \Utils\Ticket\getPriorityLabel($i) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span>
                            <input type="submit" name="submit" value="Create" class="button--secondary">
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>