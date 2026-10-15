<?php 

session_start();

$actividades = [
    1 => ['id' => 1, 'nombre' => 'Robótica',     'categoria' => 'Tecnología', 'plazas' => 12],
    2 => ['id' => 2, 'nombre' => 'Programación', 'categoria' => 'Tecnología', 'plazas' => 20],
    3 => ['id' => 3, 'nombre' => 'Fotografía',   'categoria' => 'Arte',       'plazas' => 15],
    4 => ['id' => 4, 'nombre' => 'Ajedrez',      'categoria' => 'Deporte',    'plazas' => 10],
    5 => ['id' => 5, 'nombre' => 'Diseño 3D',    'categoria' => 'Tecnología', 'plazas' => 8],
    6 => ['id' => 6, 'nombre' => 'Podcast',      'categoria' => 'Medios',     'plazas' => 14],
];



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscripción en actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- ===================== NAVEGACIÓN ===================== -->
<nav class="navbar navbar-expand navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="inscripcion.php">Actividades</a>
        <div class="navbar-nav">
            <a class="nav-link" href="inscripcion.php">Inscribirse</a>
            <a class="nav-link" href="inscripcion.php?accion=listado">Ver inscripciones</a>
        </div>
    </div>
</nav>
<main class="container" style="max-width: 800px;">
    <!-- ===================== VISTA 1: FORMULARIO (GET sin parámetros / POST con errores) ===================== -->
    <section class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h1 class="h4 mb-0">Formulario de inscripción</h1>
        </div>
        <div class="card-body">
            <form action="inscripcion.php" method="post" novalidate>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre y apellidos</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="María García López" value="">
                </div>

                <div class="mb-3">
                    <label for="curso" class="form-label">Curso</label>
                    <select class="form-select" id="curso" name="curso">
                        <option value="">-- Selecciona un curso --</option>
                        <option value="1º DAW">1º DAW</option>
                        <option value="2º DAW">2º DAW</option>
                        <option value="1º DAM">1º DAM</option>
                        <option value="2º DAM">2º DAM</option>
                    </select>
                </div>

                <fieldset class="mb-3">
                    <legend class="form-label fs-6">Actividades y turno</legend>
                    <p class="text-muted small">Marca las actividades en las que quieres participar y elige un turno para cada una.</p>

                    <?php foreach($actividades as $actividad){ ?>
                    <div class="border rounded p-3 mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?php echo $actividad["id"]?>" name="actividades[]">
                                <label class="form-check-label fw-semibold" for="act1"><?php echo $actividad["nombre"]?></label>
                            </div>
                            <a href="inscripcion.php?info=<?php echo $actividad["id"] ?>" class="btn btn-sm btn-outline-primary">Más info</a>
                        </div>
                        <div class="mt-2 ms-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="turno[1]" id="turno1m" value="Mañana">
                                <label class="form-check-label" for="turno1m">Mañana</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="turno[1]" id="turno1t" value="Tarde">
                                <label class="form-check-label" for="turno1t">Tarde</label>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </fieldset>
                <button type="submit" class="btn btn-primary">Inscribirme</button>
            </form>
        </div>
    </section>


    <!-- ===================== VISTA 2: INFORMACIÓN DE UNA ACTIVIDAD (GET ?actividad=ID) ===================== -->
    <section class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h1 class="h4 mb-0">Información de la actividad</h1>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-4">Nombre</dt>
                <dd class="col-sm-8">Robótica</dd>
                <dt class="col-sm-4">Categoría</dt>
                <dd class="col-sm-8">Tecnología</dd>
                <dt class="col-sm-4">Plazas disponibles</dt>
                <dd class="col-sm-8">12</dd>
            </dl>
        </div>
        <div class="card-footer bg-white">
            <a href="inscripcion.php" class="btn btn-outline-secondary btn-sm">&larr; Volver al formulario</a>
        </div>
    </section>

    <!-- Error: actividad inexistente / parámetro incorrecto (no mostrar el formulario) -->
    <section class="mb-4">
        <div class="alert alert-danger" role="alert">
            La actividad solicitada no existe.
        </div>
        <a href="inscripcion.php" class="btn btn-outline-secondary btn-sm">&larr; Volver al formulario</a>
    </section>


    <!-- ===================== VISTA 3: RESUMEN DE LA INSCRIPCIÓN (POST correcto) ===================== -->
    <section class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h1 class="h4 mb-0">Inscripción realizada</h1>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>Alumno:</strong> María García López</p>
            <p class="mb-3"><strong>Curso:</strong> 2º DAW</p>
            <p class="mb-1"><strong>Actividades seleccionadas:</strong></p>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    Programación <span class="badge text-bg-primary">Mañana</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    Robótica <span class="badge text-bg-primary">Tarde</span>
                </li>
            </ul>
        </div>
        <div class="card-footer bg-white">
            <a href="inscripcion.php" class="btn btn-outline-secondary btn-sm">Nueva inscripción</a>
            <a href="inscripcion.php?accion=listado" class="btn btn-outline-primary btn-sm">Ver todas</a>
        </div>
    </section>


    <!-- ===================== VISTA 4: LISTADO (GET ?accion=listado) ===================== -->
    <section class="card shadow-sm mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Inscripciones realizadas</h1>
            <!-- Cancelación: se envía por POST -->
            <form action="inscripcion.php" method="post" class="m-0">
                <input type="hidden" name="accion" value="cancelar">
                <button type="submit" class="btn btn-danger btn-sm">Eliminar todas</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Actividades (turno)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Repetir fila por cada inscripción -->
                    <tr>
                        <td>1</td>
                        <td>María García López</td>
                        <td>2º DAW</td>
                        <td>
                            <ul class="mb-0 ps-3">
                                <li>Programación (Mañana)</li>
                                <li>Robótica (Tarde)</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Listado vacío -->
    <section class="mb-4">
        <div class="alert alert-info" role="alert">
            Todavía no hay ninguna inscripción realizada.
        </div>
        <a href="inscripcion.php" class="btn btn-outline-secondary btn-sm">&larr; Ir al formulario</a>
    </section>

</main>

<footer class="text-center text-muted small py-4">
    Ejercicio 2 · Inscripción en actividades
</footer>

</body>
</html>