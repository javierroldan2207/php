<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php 
    if(isset($_GET["nombre"]) && isset($_GET["edad"])){
        $text = $_GET["nombre"];
        $age = $_GET["edad"];
    }else{
        $text = "";
        $age = 0;
    }
    
?>

<body>
<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 400px;">

        <h3 class="text-center mb-4">Formulario</h3>

        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre" 
                    name="nombre"
                    placeholder="Introduce tu nombre"
                    required
                >
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="edad" 
                    name="edad"
                    placeholder="Introduce tu edad"
                    required
                >
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
            <h5>
                <?php 
                    if(isset($_GET["nombre"]) && $age >= 18){
                        echo "Hola $text, eres mayor de edad.";
                    }
                    elseif(isset($_GET["nombre"]) && $age < 18){
                        echo "Hola $text, eres menor de edad.";
                    }else{
                        echo "";
                    }
                ?>
            </h5>
        </form>
    </div>
</div>
</body>
</html>
