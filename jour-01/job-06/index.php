<?php

function my_array_sort(array $arrayToSort, string $order): array {
    if ($order === 'ASC') {
        sort($arrayToSort);
    } else {
        rsort($arrayToSort);
    }
    return $arrayToSort;
}

echo implode(', ', my_array_sort([2, 24, 12, 7, 34], 'ASC')) . "\n";
echo implode(', ', my_array_sort([8, 5, 23, 89, 6, 10], 'DESC')) . "\n";

?>