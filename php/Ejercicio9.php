<?php
function type($number){
    $result = 'El numero es impar';
    if($number === 0){
        $result = 'El numero es 0.';
    }
    else if($number % 2 === 0){
        $result = 'El numero es par.';
    }
    return $result;
}
echo(type(22));
echo(type(133));
echo(type(0));

