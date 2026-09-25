<?php
function dayOfWeek($day){
    switch ($day) {
        case 1:
            echo('Lunes');
            break;
        case 2:
            echo('Martes');
            break;
        case 3:
            echo('Miercoles');
            break;
        case 4:
            echo('Jueves');
            break;
        case 5:
            echo('Viernes');
            break;
        case 6:
            echo('Sabado');
            break;
        case 7:
            echo('Domingo');
            break;
    }
}
dayOfWeek(4);
dayOfWeek(1);
dayOfWeek(6);
dayOfWeek(3);