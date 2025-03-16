<?php
$text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
galley of type and scrambled it to make a type specimen book. It has survived not only five
centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was
popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
and more recently with desktop publishing software like Aldus PageMaker including versions of
Lorem Ipsum.";

$arr = explode(" ", $text);

for ($i = 0; $i < count($arr); $i++) {
    $string = $arr[$i];

    for ($j = 0; $j < strlen($string); $j++) {
        $char = $string[$j];

        if ($char == "," || $char == "." || $char == "'") {
            for ($k = $j + 1; $k < strlen($string); $k++) {
              $arr[$i][$k - 1] = $arr[$i][$k];
            }
            $arr[$i] = substr($arr[$i], 0, -1);
        }
    }
}

$arr2 = array();

for ($i = 0; $i < count($arr); $i += 2) {
    if (count($arr) - $i - 1 >= 2) {
        $arr2[$arr[$i]] = $arr[$i + 1];
    }
}

foreach ($arr2 as $key => $value) {
    echo "'" . $key . "' => '" . $value . "'\n";
}
