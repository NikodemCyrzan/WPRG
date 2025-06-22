<?php
require_once __DIR__ . '/database/teams.php';

$teams = \Database\Teams\getAllTeams();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include __DIR__ . "/components/navbar.php" ?>
    <div class="center__container">
        <div class="center__content">
            <h1 class="title">Teams</h1>
            <div class="groups">
                <?php foreach ($teams as $team) { ?>
                    <a class="group team__container" href="team.php?id=<?php echo $team->id; ?>">
                        <?php echo $team->name; ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>