<?php

$edad = 20;

if($edad < 18 && $edad > 0){
    echo('Es menor de edad.');
}
else if($edad >=18){
    echo('Es mayor de edad');
}else{
    echo('Edad incorrecta.');
}