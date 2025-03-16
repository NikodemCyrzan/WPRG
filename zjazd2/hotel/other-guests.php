<?php
if (!isset($_POST["submit"])) {
    header("Location: ./index.php");
    exit();
}

$errors = array();

function validate_data()
{
    global $errors;

    if (!isset($_POST["submit"])) {
        return false;
    }

    if (!isset($_POST["count"])) {
        array_push($errors, "Nie podano ilości osób");
    }

    if (!isset($_POST["name"])) {
        array_push($errors, "Nie podano imienia");
    }

    if (!isset($_POST["surname"])) {
        array_push($errors, "Nie podano nazwiska");
    }

    if (!isset($_POST["address"])) {
        array_push($errors, "Nie podano adresu");
    }

    if (!isset($_POST["card-id"])) {
        array_push($errors, "Nie podano numeru karty kredytowej");
    }

    if (!isset($_POST["email"])) {
        array_push($errors, "Nie podano adresu email");
    }

    if (!isset($_POST["date"])) {
        array_push($errors, "Nie podano daty pobytu");
    }

    return sizeof($errors) <= 0;
}

$success = validate_data();

if ($success || $_POST["count"] == "1") {
    header("Location: ./display.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <form action="./display.php" method="post">
        <input type="hidden" name="count" value="<?php echo $_POST["count"] ?>" />
        <input type="hidden" name="name" value="<?php echo $_POST["name"] ?>" />
        <input type="hidden" name="surname" value="<?php echo $_POST["surname"] ?>" />
        <input type="hidden" name="address" value="<?php echo $_POST["address"] ?>" />
        <input type="hidden" name="card-id" value="<?php echo $_POST["card-id"] ?>" />
        <input type="hidden" name="email" value="<?php echo $_POST["email"] ?>" />
        <input type="hidden" name="date" value="<?php echo $_POST["date"] ?>" />
        <input type="hidden" name="date" value="<?php echo $_POST["child-bed"] ?>" />
        <input type="hidden" name="date" value="<?php echo $_POST["balcony"] ?>" />
        <input type="hidden" name="date" value="<?php echo $_POST["tv"] ?>" />
        <?php
        for ($i = 0; $i < $_POST["count"]; $i++) {
            echo "<div>Osoba " . ($i + 1) . "</div>";
        ?>
            <input type="name-<?php echo $i ?>">
            <input type="surname-<?php echo $i ?>">
            <hr>
        <?php
        }
        ?>
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>