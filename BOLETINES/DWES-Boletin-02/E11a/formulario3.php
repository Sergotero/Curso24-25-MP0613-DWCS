<?php

 echo <<<SALIDA
 <div class="entrada">
    <p>
        <label for="numero" id="textoNumero">Introduzca un número entero positivo:</label>
        <input type="text" id="numero" name="{numero}" value="{$numero}" disabled />
    </p>


     <!--  Estado autómata -->
     <input type="hidden" name="estado" value="{$estado}"/>
     <input type="hidden" name="numero" value="{$numero}"/>


     <br>
     <p>Número original: {$numero}</p>
     <p>Imagen espejo del número: {$invertido}</p>
     
     <!--  Botonera -->
     <button type="submit">Enviar</button>      
     <button type="reset" ><a href="{$_SERVER['PHP_SELF']}" style="text-decoration: none;">Borrar</a></button>
 </div>
SALIDA;  

?>