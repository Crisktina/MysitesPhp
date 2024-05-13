<?php
$elems = array();
for ($i = 0; $i < 10; $i++) {
    $elems[] = rand(1, 100);
}

$sumatori = array_sum($elems);
$max = max($elems);
$min = min($elems);

echo "Elements del vector: " . implode(", ", $elems) . "<br>";
echo "Suma: " . $sumatori . "<br>";
echo "Màxim: " . $max . "<br>";
echo "Mínim: " . $min . "<br>";
?>