<?php

function calculadora($a,$b,$operador){
    $alert = 'Error';
    switch ($operador) {
        case '*':
            return $a*$b;
            break;
        
        case '/':
            if($b===0){
                return $alert;
            }else{
                return $a/$b;
            }
            break;
        case '+':
            return $a+$b;
        case '-':
            return $a+$b;
    }
}
echo calculadora(2,4,'*'). "<br>";
echo calculadora(10,3,'+')."<br>";
echo calculadora(10,0,'/');
