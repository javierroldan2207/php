<?php

$alumnos = [
["nombre" => "Ana", "edad" => 19, "nota" => 7.5],
["nombre" => "Luis", "edad" => 21, "nota" => 6.8],
["nombre" => "Marta", "edad" => 18, "nota" => 9.2],
["nombre" => "Carlos", "edad" => 20, "nota" => 5.4],
];

function maxNota($alumnos){
    $result = '';
    $maxNota = 0;
    foreach ($alumnos as  $alum) {
        if($alum["nota"] > $maxNota){
            $maxNota = $alum["nota"];
            $result = $alum["nombre"];
        }
    }
    return $result . "<br>";
}
echo maxNota($alumnos);

function notaMedia($alumnos){
    $sum = 0;
    foreach($alumnos as $alum){
        $sum += $alum["nota"];
    }
    return $sum/count($alumnos)."<br>";
}

echo notaMedia($alumnos);

function mayor19($alumnos){
    foreach ($alumnos as $alum) {
       if($alum["edad"] > 19){
        echo $alum["nombre"] . " " . $alum["edad"] . " " . $alum["nota"] . "<br>";
       }
    }
}

mayor19($alumnos);