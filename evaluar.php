<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de tabla de multiplicar</title>
</head>
<body>
    <h2>Evaluación de tabla de multiplicar</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['tabla'], $_POST['rango_inicio'], $_POST['rango_fin']) && 
            is_numeric($_POST['tabla']) && is_numeric($_POST['rango_inicio']) && is_numeric($_POST['rango_fin'])) {
            $tabla = intval($_POST['tabla']);
            $rango_inicio = intval($_POST['rango_inicio']);
            $rango_fin = intval($_POST['rango_fin']);

            
            $rango = [$rango_inicio, $rango_fin];
            sort($rango);
            $rango_inicio = $rango[0];
            $rango_fin = $rango[1];

            echo "<h3>Tabla del $tabla (rango $rango_inicio - $rango_fin):</h3>";
            echo "<form action='evaluar_respuesta.php' method='POST'>";
            echo "<input type='hidden' name='tabla' value='$tabla'>";
            echo "<input type='hidden' name='rango_inicio' value='$rango_inicio'>";
            echo "<input type='hidden' name='rango_fin' value='$rango_fin'>";
            echo "<table>";
            for ($i = $rango_inicio; $i <= $rango_fin; $i++) {
                echo "<tr><td>$tabla x $i = </td><td><input type='number' name='respuestas[]' required></td></tr>";
            }
            echo "</table>";
            echo "<br>";
            echo "<input type='submit' name='evaluar' value='Evaluar respuestas'>"; 
            echo "</form>";
        } else {
            echo "<p>Debe ingresar números válidos para la tabla y el rango.</p>";
        }
    } else {
        echo "<p>No se recibió ningún dato del formulario.</p>";
    }
    ?>
    <a href="index.html">Volver al formulario</a>
</body>
</html>
