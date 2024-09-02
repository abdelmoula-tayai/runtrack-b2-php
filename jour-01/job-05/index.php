<?php

function my_is_prime(int $number): bool {
     if ($number < 2) {
        return false;
     }
        for ($i = 2; $i <= sqrt($number); $i++){
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
}

echo my_is_prime(3) ? 'true' : 'false';
echo my_is_prime(12) ? 'true' : 'false';

?>