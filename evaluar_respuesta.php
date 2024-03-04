<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificación de respuestas</title>
</head>
<body>
    <h2>Calificación de respuestas</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['tabla'], $_POST['rango_inicio'], $_POST['rango_fin'], $_POST['respuestas']) && 
            is_numeric($_POST['tabla']) && is_numeric($_POST['rango_inicio']) && is_numeric($_POST['rango_fin'])) {
            $tabla = intval($_POST['tabla']);
            $rango_inicio = intval($_POST['rango_inicio']);
            $rango_fin = intval($_POST['rango_fin']);
            $respuestas = $_POST['respuestas'];
            
           
            echo "<h3>Tabla del $tabla (rango $rango_inicio - $rango_fin):</h3>";
            echo "<table>";
            $correctas = 0;
            for ($i = $rango_inicio, $j = 0; $i <= $rango_fin; $i++, $j++) {
                $respuesta = intval($respuestas[$j]);
                $resultado = $tabla * $i;
                echo "<tr><td>$tabla x $i = $resultado</td>";
                if ($respuesta == $resultado) {
                    echo "<td style='color: green;'>¡Correcto!</td>";
                    $correctas++;
                } else {
                    echo "<td style='color: red;'>Incorrecto, la respuesta correcta es $resultado</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            $total_preguntas = $rango_fin - $rango_inicio + 1;
            $puntaje = ($correctas / $total_preguntas) * 100;
            echo "<p>Tu puntaje: $puntaje%</p>";
            echo "<p>Preguntas correctas: $correctas / $total_preguntas</p>";
        } else {
            echo "<p>No se recibió correctamente la información del formulario.</p>";
        }
    } else {
        echo "<p>No se recibió ningún dato del formulario.</p>";
    }
    ?>
    <a href="index.html">Volver al formulario</a>
</body>
</html>
