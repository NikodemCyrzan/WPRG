<?php

$res = "";

if (isset($_POST["submit"]) && isset($_POST["a"]) && isset($_POST["b"])  && isset($_POST["op"])) {
    $operation = $_POST["op"];

    switch ($operation) {
        case "+":
            $res = $_POST["a"] + $_POST["b"];
            break;
        case "-":
            $res = $_POST["a"] - $_POST["b"];
            break;
        case "*":
            $res = $_POST["a"] * $_POST["b"];
            break;
        case "/":
            if ($_POST["b"] == 0) {
                $res = "Nie dziel przez 0";
            } else {
                $res = $_POST["a"] / $_POST["b"];
            }
            break;
        default:
            break;
    }
}

?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <form action="index.php" method="post">
        <input type="number" name="a">
        <br>
        <input type="number" name="b">
        <br>
        <select name="op">
            <option value="+" default>+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>
        <input type="submit" value="submit" name="submit">
        <br>
        <div>
            <?php
            echo $res;
            ?>
        </div>
    </form>
</body>

</html>