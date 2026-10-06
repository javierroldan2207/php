<?php 
$products = [
    1 => [
        "id"        => 1,
        "nombre"    => "Teclado",
        "precio"    => 24.99,
        "categoria" => "Periféricos",
        "stock"     => 40
    ],
    2 => [
        "id"        => 2,
        "nombre"    => "Ratón",
        "precio"    => 14.50,
        "categoria" => "Periféricos",
        "stock"     => 55
    ],
    3 => [
        "id"        => 3,
        "nombre"    => "Monitor",
        "precio"    => 149.90,
        "categoria" => "Pantallas",
        "stock"     => 15
    ],
    4 => [
        "id"        => 4,
        "nombre"    => "Webcam",
        "precio"    => 35.00,
        "categoria" => "Vídeo",
        "stock"     => 25
    ],
    5 => [
        "id"        => 5,
        "nombre"    => "Auriculares",
        "precio"    => 29.95,
        "categoria" => "Audio",
        "stock"     => 30
    ],
    6 => [
        "id"        => 6,
        "nombre"    => "Alfombrilla",
        "precio"    => 8.99,
        "categoria" => "Accesorios",
        "stock"     => 80
    ],
    7 => [
        "id"        => 7,
        "nombre"    => "Micrófono",
        "precio"    => 45.00,
        "categoria" => "Audio",
        "stock"     => 12
    ],
    8 => [
        "id"        => 8,
        "nombre"    => "Altavoces",
        "precio"    => 39.90,
        "categoria" => "Audio",
        "stock"     => 20
    ],
    9 => [
        "id"        => 9,
        "nombre"    => "Disco duro externo",
        "precio"    => 59.99,
        "categoria" => "Almacenamiento",
        "stock"     => 18
    ],
    10 => [
        "id"        => 10,
        "nombre"    => "Memoria USB",
        "precio"    => 9.95,
        "categoria" => "Almacenamiento",
        "stock"     => 100
    ],
    11 => [
        "id"        => 11,
        "nombre"    => "Cable HDMI",
        "precio"    => 6.50,
        "categoria" => "Accesorios",
        "stock"     => 60
    ],
    12 => [
        "id"        => 12,
        "nombre"    => "Soporte para portátil",
        "precio"    => 19.99,
        "categoria" => "Accesorios",
        "stock"     => 0   
    ]
];

$detail = null;

if(isset($_GET["id"]) && isset($products[$_GET["id"]])){
    $detail = $products[$_GET["id"]];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de productos</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tienda Tech</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Catálogo</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Catálogo de productos</h1>
            <p class="lead mb-0">Consulta los productos disponibles, sus precios y su stock.</p>
        </div>
    </div>
    <div class="container mb-5">
        <?php if($detail != null){ ?>
            <div class="card border-primary mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Detalles del producto
        </div>
        <div class="card-body">
            <h4><?php echo $detail["nombre"]; ?></h4>
            <p class="mb-1">ID: <?php echo $detail["id"]; ?></p>
            <p class="mb-1">Categoría: <?php echo $detail["categoria"]; ?></p>
            <p class="mb-1">Precio: <?php echo $detail["precio"]; ?> €</p>
            <p class="mb-3">Stock: <?php echo $detail["stock"]; ?> unidades</p>
            <a href="?" class="btn btn-secondary">Cerrar</a>

        <?php } else { ?>

        <div class="row">
            <?php foreach($products as $product){ ?>
                <div class="card h-100 shadow-sm">
                        <div class="card-header text-muted"></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product["nombre"] ?></h5>
                            <p class="card-text text-muted mb-1"><?php echo $product["categoria"] ?></p>
                            <p class="h4 text-primary"><?php echo$product["precio"] ?></p>
                            <span class="badge badge-success"><?php echo $product["stock"] ?></span>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="" class="btn btn-primary btn-block">Añadir</a>
                            <a href="?id=<?php echo $product["id"]; ?>" class="btn btn-secondary btn-block">Detalles</a> 
                        </div>
                </div>
            <?php } ?>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
        <?php } ?>
                
            </div>
        </div>
    </div>
</body>
</html>