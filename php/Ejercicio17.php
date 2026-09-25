<?php

function factorial($number){
    $result = 1;
    for($i=1;$i <= $number;$i++){
        $result = $result * $i;
    }
    return $result;
}
echo factorial(0);

