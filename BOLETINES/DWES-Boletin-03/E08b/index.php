<?php
    function diaDeLaSemana($dia, $mes, $anno) {
        if ($mes < 3) {
            $dia += $anno;
            --$anno;
        } else {
            $dia += $anno - 2;
        }
        
        // necesitamos aritmética entera: que cada operación sea de tipo int para que 
        // la expresión funcione (fue diseñada para C): PHP por defecto opera en coma flotante...
        $diaSemana = (int) (( (int) (23 * $mes / 9) + (int) ($dia + 4) +  (int) ($anno / 4) -  (int) ($anno / 100) +  (int) ($anno / 400) ) % 7 );
        return match ($diaSemana) {
            0 => "domingo",
            1 => "lunes",
            2 => "martes",
            3 => "miércoles",
            4 => "jueves",
            5 => "viernes",
            6 => "sábado",
        };
    }
    
    function calcularDiasMes ($mes, $anno)  {
        return match ($mes) {
            2 => ( ($anno % 4 == 0) && ($anno % 100 !== 0 )) || ( $anno % 400 == 0)   ? 29 : 28,
            4, 6, 9, 11 => 30,
            default => 31
        };
    }        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES-PHP-B03-08b</title>
</head>
<body >

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="get">
<?php
    $dia  = empty($_GET['dia']) ?  "": intval($_GET['dia']);
    $mes  = empty($_GET['mes']) ?  "": intval($_GET['mes']);
    $anno = empty($_GET['anno']) ? "": intval($_GET['anno']);
    echo <<<MARCA
    <p>
        <label for="dia">Introduzca un día de mes [1..31]:</label>
        <input type="number"  min="1" max="31" step="1"  id="dia" name="dia" value="{$dia}" required />
    </p>
    <p>
        <label for="mes">Introduzca un número de mes [1..12]:</label>
        <input type="number"  min="1" max="12" step="1"  id="mes" name="mes" value="{$mes}" required />
    </p>    
    <p>
        <label for="anno">Introduzca un número año [1..]:</label>
        <input type="number" min="1" step="1"  id="anno" name="anno" value="{$anno}" required />
    </p>    
MARCA;
    $segundaVez = false;
    if ( !isset($_GET['dia']) ) {
        ;
    } else {
        $segundaVez = true;
    }

    // Solo ejecutamos el cálculo de dia de mes si 
    if ($dia == "" || $mes == ""  || $anno == "")  {  // aunque el html se encarga de comprobar rango, no hace daño probar aquí
         if ($segundaVez) {
            echo <<<MARCA
            <p style="color: red">Introduzca los 3 datos solicitados, por favor</p>
            <p id="digitos">&nbsp;</p>
MARCA;
        }
    } else {
        // Comprobar si la entrada es válida:
        $temp = calcularDiasMes($mes, $anno);
        if ( $mes < 1 || $mes > 12)  {
            echo "<p>" . "El número de mes {$mes} no es válido, por favor, introduzca valor correcto" . "</p>";
        } else if ( $dia > $temp || $dia < 1) {
            echo "<p>" . "Número de días no válido para este mes: por favor, introduzca valor correcto" . "[1..{$temp}]" . "</p>";
        } else if ( $anno <= 0 ) {
            echo "<p>" . "Número de año incorrecto: debe ser mayor que 0" . "</p>";
        }
        else {
            echo "<p>". "El día de semana es: " . diaDeLaSemana($dia, $mes, $anno) . "</p>"; 
        }
    }
?>
        <button id="botonEnviar" type="submit">Enviar</button>      
        <button type="reset" ><a href="<?php echo $_SERVER['PHP_SELF'] ?>" style="text-decoration: none;">Borrar</a></button>
    </form>
</body>
</html>