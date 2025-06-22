<?php
require_once __DIR__ . "/../sessions/user.php";

$isLoggedIn = \Sessions\User\isLoggedIn();
?>
<div class="navbar__container">
    <div class="navbar__content">
        <div class="navbar__content-group">
            <a href="/">Homepage</a>
            <a href="teams.php">Teams</a>
        </div>
        <?php if ($isLoggedIn) {
            $user = \Sessions\User\getUser();
        ?>
            <div class="navbar__content-group">
                <a href="/create-ticket.php" class="button--rect button--normal">Create ticket</a>
                <a href="/team.php?id=<?php echo $user->teamID ?>" class="button--rect button--secondary">Your team</a>
            </div>
        <?php } else { ?>
            <div class="navbar__content-group">
                <a href="/register.php" class="button--rect button--secondary">Register</a>
                <a href="/login.php" class="button--rect button--normal">Login in</a>
            </div>
        <?php } ?>
    </div>
</div>