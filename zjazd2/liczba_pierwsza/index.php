<?php

$error = '';
$result;
$iterations = 0;
$number = '';

function isPrime($n)
{
    global $iterations;

    if ($n < 2) {
        return false;
    }

    if ($n == 2) {
        $iterations++;
        return true;
    }

    if ($n % 2 == 0) {
        $iterations++;
        return false;
    }

    for ($i = 3; $i <= sqrt($n); $i += 2) {
        $iterations++;

        if ($n % $i == 0) {
            return false;
        }
    }

    return true;
}

function calculate()
{
    global $number;
    global $error;
    global $result;

    if (!isset($_POST["number"])) {
        $error = "Nie podano liczby";
        return;
    }

    $number = trim($_POST["number"]);

    if ($number <= 0) {
        $error = "Wprowadź dodatnią liczbę całkowitą";
        return;
    }

    $isPrime = isPrime($number);
    if ($isPrime) {
        $result = "Liczba $number jest liczbą pierwszą";
    } else {
        $result = "Liczba $number nie jest liczbą pierwszą";
    }
}

calculate();
?>
<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div>
        <?php
        if ($error) {
        ?>
            <p><?php echo $error; ?></p>
        <?php
        }
        ?>

        <form method="POST">
            <label for="number">Wprowadź liczbę:</label>
            <input type="number" name="number" min="1" value="<?php echo $number; ?>" required>
            <br>
            <button type="submit">Sprawdź</button>
        </form>

        <?php
        if ($result) {
        ?>
            <div>
                <h3>Wynik:</h3>
                <p><?php echo $result; ?></p>
                <p>Liczba iteracji: <?php echo $iterations; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>
