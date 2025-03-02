<?php
function reverse($string)
{
    $output = "";
    for ($i = 0; $i < strlen($string); $i++) {
        $output .= $string[strlen($string) - $i - 1];
    }
    return $output;
}

$arr = array("gruszka", "pomarancza", "pomelo", "jablko", "arbuz", "banan");

for ($i = 0; $i < count($arr); $i++) {
    echo ($arr[$i][0] == "p" ? "Zaczyna się od 'p'" : "Nie zaczyna się od 'p'") . ": " . reverse($arr[$i]) . "\n";
}
