<?php
$range_start = 2;
$range_end = 100;

for ($i = $range_start; $i <= $range_end; $i++) {
    if ($i <= 1) {
        continue;
    }

    $isPrime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo $i . "\n";
    }
}
