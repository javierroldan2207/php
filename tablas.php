<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tabla de multiplicar</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

    <?php
        $num = null;

        if (isset($_GET["numero"]) && $_GET["numero"] !== "") {
            $num =  $_GET["numero"];
        }
    ?>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h2>Tabla de multiplicar</h2>
                    </div>

                    <div class="card-body">

                        <form method="GET" action="">

                            <div class="mb-3">
                                <label for="numero" class="form-label">
                                    Introduce un número
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="numero"
                                    name="numero"
                                    placeholder="Ejemplo: 5"
                                    required
                                    value="<?php echo $num ?? ''; ?>"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Mostrar tabla
                            </button>

                        </form>

                        <?php if ($num !== null): ?>

                            <div class="mt-4">
                                <h4>Resultado</h4>

                                <div class="list-group">

                                    <?php
                                        for ($i = 1; $i <= 10; $i++) {
                                            $resultado = $num * $i;

                                            echo "
                                                <div class='list-group-item'>
                                                    $num × $i = $resultado
                                                </div>
                                            ";
                                        }
                                    ?>

                                </div>
                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>