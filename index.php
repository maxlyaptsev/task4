<?php

/**
 * the sum of very big numbers
 * > 2 147 483 647
 * @param string $a
 * @param string $b
 * @return string
 */
function sumBigNumbers(string $a, string $b) {

    $length = max(strlen($a), strlen($b));

    // выравниваем количество символов в строке
    $a = str_repeat('0', $length-strlen($a)).$a;
    $b = str_repeat('0', $length-strlen($b)).$b;

    $rest = 0;
    for ($i = $length - 1; $i >= 0; $i--) {
        $sumLetter = (int)$rest + (int)$a[$i] + (int)$b[$i];
        // т.к. максимальное число может быть 81, нужно распределить на разные десятки
        $sum[$i] = (int)($sumLetter) % 10; // остаток + берем дробную часть
        $rest = (int)($sumLetter / 10); // сохраняем целую часть в остаток
    }
    if($rest > 0) {
        $sum[] = $rest;
    }

    // раскладываем массив в строку
    return implode('', array_reverse($sum));
}


echo 'example: 2147483647 + 2147483647 = ' . sumBigNumbers('2147483647', '2147483647');