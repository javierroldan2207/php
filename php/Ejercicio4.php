<?php
function clase($num){
    $resultado ='El numero es impar.';
    if($num===0){
        $resultado = 'El numero es 0.';
    }
    else if($num%2===0){
        $resultado = 'El numero es par.';
    }
    return $resultado;
}
echo(clase(23));
echo(clase(2));
echo(clase(0));