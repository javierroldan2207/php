<?php

function separador($string){
    $arraySplit = str_split($string);
    foreach($arraySplit as $leter){
        echo $leter . "<br>";
    }
}    

separador("hola");
