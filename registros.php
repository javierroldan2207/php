<?php

$personas = [
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

?>
<!DOCTYPE html>
<html lang="en">
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
      <th scope="col">Profesion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach ($personas as $persona) {
            echo "<tr>";
            echo '<td><a href="registros.php?codigo=' . htmlspecialchars($persona["codigo"]) . '">' 
                . htmlspecialchars($persona["codigo"]) . '</a></td>';
            echo "<td>" . htmlspecialchars($persona["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($persona["apellido"]) . "</td>";
            echo "<td>" . htmlspecialchars($persona["edad"]) . "</td>";
            echo "<td>" . htmlspecialchars($persona["profesion"]) . "</td>";
            echo "</tr>";
        }
?>
  </tbody>
</table>
</body>
</html>