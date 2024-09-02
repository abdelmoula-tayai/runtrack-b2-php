<?php

function my_is_multiple(int $divider, int $multiple): bool {
    return $multiple % $divider === 0;
}

echo my_is_multiple(2, 4) ? 'true' : 'false';
echo my_is_multiple(2, 5) ? 'true' : 'false';


?>