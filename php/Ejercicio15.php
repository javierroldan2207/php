<?php
$numbers = [1, 2, 3, 4];
$sum = 0;
foreach ($numbers as $num){
    $sum = $sum + $num;
}
echo $sum/count($numbers);