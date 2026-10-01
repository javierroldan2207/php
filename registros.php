<?php

session_start();

if (!isset($_SESSION["personas"])) {
    $_SESSION["personas"] = [
        [
            "codigo" => 1,
            "nombre" => "Juan",
            "apellido" => "Pérez",
            "edad" => 28,
            "profesion" => "Ingeniero"
        ],
        [
            "codigo" => 2,
            "nombre" => "María",
            "apellido" => "González",
            "edad" => 34,
            "profesion" => "Doctora"
        ],
        [
            "codigo" => 3,
            "nombre" => "Carlos",
            "apellido" => "López",
            "edad" => 22,
            "profesion" => "Estudiante"
        ]
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {

    $codigo = $_POST["codigo"];

    foreach ($_SESSION["personas"] as $posicion => $persona) {
        if ($persona["codigo"] == $codigo) {
            $_SESSION["personas"][$posicion]["nombre"] = $_POST["nombre"];
            $_SESSION["personas"][$posicion]["apellido"] = $_POST["apellido"];
            $_SESSION["personas"][$posicion]["edad"] = $_POST["edad"];
            $_SESSION["personas"][$posicion]["profesion"] = $_POST["profesion"];
        }
    }
}else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])){
    $nuevoCodigo = 1;

    foreach($_SESSION["personas"] as $persona){
        if($persona["codigo"] >= $nuevoCodigo){
            $nuevoCodigo = $persona["codigo"];
        }
    }

    $_SESSION["personas"] []= [
        "codigo" => $nuevoCodigo + 1,
        "nombre" => $_POST["nombre"],
        "apellido" => $_POST["apellido"],
        "edad" => $_POST["edad"],
        "profesion" => $_POST["profesion"]
    ];
}

$personaSeleccionada = null;

if(isset($_GET["nuevo"])){
    $personaSeleccionada = [
        "codigo" => "",
        "nombre" => "",
        "apellido" => "",
        "edad" => "",
        "profesion" => ""
    ];
}

if (isset($_GET["codigo"])) {
    $codigoClicado = $_GET["codigo"];

    foreach ($_SESSION["personas"] as $persona) {
        if ($persona["codigo"] == $codigoClicado) {
            $personaSeleccionada = $persona;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Profesión</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION["personas"] as $persona) {
                echo "<tr>";
                echo '<td><a href="registros.php?codigo=' . $persona["codigo"] . '">' . $persona["codigo"] . '</a></td>';
                echo "<td>" . htmlspecialchars($persona["nombre"]) . "</td>";
                echo "<td>" . htmlspecialchars($persona["apellido"]) . "</td>";
                echo "<td>" . htmlspecialchars($persona["edad"]) . "</td>";
                echo "<td>" . htmlspecialchars($persona["profesion"]) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    <a href="registros.php?nuevo=1" class="btn btn-success">Añadir</a>
    
    <?php
    if ($personaSeleccionada != null) {?>

        <form method="post" action="registros.php">

            <input type="hidden" name="codigo" value="<?php echo $personaSeleccionada["codigo"]; ?>">

            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($personaSeleccionada["nombre"]); ?>">

            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo htmlspecialchars($personaSeleccionada["apellido"]); ?>">

            <label>Edad</label>
            <input type="number" name="edad" class="form-control" value="<?php echo htmlspecialchars($personaSeleccionada["edad"]); ?>">

            <label>Profesión</label>
            <input type="text" name="profesion" class="form-control" value="<?php echo htmlspecialchars($personaSeleccionada["profesion"]); ?>">

            <br>
            
            <?php if(isset($_GET["codigo"])) { ?>
                <button type="submit" name="editar" class="btn btn-primary">Editar</button>
            <?php } else {?>
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
            <?php }?>
                <a href="registros.php" class="btn btn-secondary">Cancelar</a>
        </form>
    <?php
    }
    ?>

</body>
</html>