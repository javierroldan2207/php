<?php

$productos = [
 ["nombre" => "Camiseta", "precio" => 15.99, "stock" => 10],
 ["nombre" => "Pantalón", "precio" => 35.5, "stock" => 0],
 ["nombre" => "Zapatos", "precio" => 55.0, "stock" => 5],
 ["nombre" => "Gorra", "precio" => 12.0, "stock" => 20],
];


function productStock0($productos){
    foreach($productos as $product){
        if($product["stock"] === 0){
            echo $product["nombre"] . "<br>";
        }
    }
}

function totalInventory($productos){
    $result = 0;
    foreach($productos as $product){
        $result += $product["stock"] * $product["precio"];
    }
    return 'Total del stock' ." ". $result ."<br>";
}

function orderPrice($productos){
    usort($productos, function($a,$b){
        return $b["precio"] - $a["precio"];
    });
    foreach($productos as $product){
        echo $product["nombre"] . " " . $product["precio"] . "<br>";
    }
}

$accion = $_GET['accion'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Menú de Productos</title>
</head>
<body>
 
<h1>Gestión de Productos</h1>
 
<form method="get" class="botones">
    <button type="submit" name="accion" value="sin_stock">Productos sin stock</button>
    <button type="submit" name="accion" value="total_inventario">Total del inventario</button>
    <button type="submit" name="accion" value="ordenar_precio">Ordenar por precio</button>
</form>
 
<div class="resultado">
<?php
if ($accion === 'sin_stock') {
    echo "<strong>Productos sin stock:</strong><br>";
    productStock0($productos);
} elseif ($accion === 'total_inventario') {
    echo "<strong>Valor total del inventario:</strong><br>";
    echo totalInventory($productos);
} elseif ($accion === 'ordenar_precio') {
    echo "<strong>Productos ordenados de mayor a menor precio:</strong><br>";
    orderPrice($productos);
} else {
    echo "Pulsa un botón para ver el resultado.";
}
?>
</div>
 
</body>
</html>