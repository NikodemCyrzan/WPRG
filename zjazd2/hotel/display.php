<?php
$errors = array();

function validate_data()
{
    global $errors;

    if (!isset($_POST["submit"])) {
        header("Location: ./index.php");
        exit();
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
?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <a href="./index.php">&lt; Powrót</a>
    <br>
    <br>
    <?php
    if ($success) {
    ?>
        <center>
            <h1>Rezerwacja</h1>
        </center>
        <div>Ilość osób: <?php echo $_POST["count"] ?></div>
        <hr>
        <b>Osoba rezerwująca</b>
        <div>Imię: <?php echo $_POST["name"] ?></div>
        <div>Nazwisko: <?php echo $_POST["surname"] ?></div>
        <div>Adres: <?php echo $_POST["address"] ?></div>
        <div>Numer karty: <?php echo $_POST["card-id"] ?></div>
        <div>Adres email: <?php echo $_POST["email"] ?></div>
        <div>Data pobytu: <?php echo $_POST["date"] ?></div>
        <hr>
        <b>Pozostałe osoby</b>
        <?php
        for ($i = 0; $i < $_POST["count"] - 1; $i++) {
        ?>
            <div><?php echo $_POST["others"][$i]["name"]; ?> <?php echo $_POST["others"][$i]["surname"]; ?></div>
        <?php
        }
        ?>
        <!-- <br> -->
        <hr>
        <b>Dodatkowe opcje</b>
        <div>Łóżeczko dla dziecka: <?php echo isset($_POST["child-bed"]) ? "TAK" : "NIE" ?></div>
        <div>Balkon: <?php echo isset($_POST["balcony"]) ? "TAK" : "NIE" ?></div>
        <div>Telewizor: <?php echo isset($_POST["tv"]) ? "TAK" : "NIE" ?></div>
    <?php
    } else {
    ?>
        <center>
            <h1>Podano nieprawidłowe dane</h1>
        </center>
        <?php
        foreach ($errors as $error) {
        ?>
            <div>
                <?php
                echo $error;
                ?>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>