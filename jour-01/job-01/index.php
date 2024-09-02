<?php

function my_str_search(string $haystack, string $needle): int {
    return substr_count($haystack, $needle);
}

echo my_str_search('La Plateforme', 'a') . "\n";

?>