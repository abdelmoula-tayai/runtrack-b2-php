<?php

function my_closest_to_zero(array $array): int {
    if (empty($array)) {
        return 0;
    }

    $closest = $array[0];

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] === 0) {
            return 0;
        }

        if ($array[$i] > 0 && $array[$i] <= abs($closest)) {
            $closest = $array[$i];
        } elseif ($array[$i] < 0 && -$array[$i] < abs($closest)) {
            $closest = $array[$i];
        }
    }

    return $closest;
}

echo my_closest_to_zero([8, 5, 10, -1]) . "\n";

?>