<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES-PHP-B02-11a</title>
</head>
<body style="font-family: monospace">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="get">
<?php
    $estado  = (!isset($_GET['estado'])) ? 0 : intval($_GET['estado']);
    $numero  = (!isset($_GET['numero'])  || preg_match("/^[1-9]\d*$/", $_GET['numero']) !== 1 ) ? "INVALIDO" : intval($_GET['numero']);

    switch($estado) {
        case 0:
            $estado = 1;
            include "formulario1.php";
            break;

        case 1: 
            $estado = 1;
            if ( $numero === "INVALIDO" ) {
                include "formulario2.php";
            } else {
                $temp = $numero;
                $invertido = "";
                while ( $temp > 0 ) {
                    $invertido .= (int)($temp % 10);
                    $temp = (int)($temp / 10);
                }
                include "formulario3.php";
            }

            break;

        default: throw new Exception("Estado no válido: " . $estado);
    }
      
?>
</form>
</body>
</html>