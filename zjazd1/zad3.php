<?php
$N = 5;
$arr = array();

function fibo($i = 0, $a = 1, $b = 1)
{
    global $N;
    global $arr;

    if ($i >= $N) {
        return;
    }

    if ($i < 2) {
        array_push($arr, 1);
    } else {
        array_push($arr, $a + $b);
    }

    fibo(++$i, $b, $a + $b);
}

fibo();

for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] % 2 != 0) {
        echo $i . ": " . $arr[$i] . "\n";
    }
}
