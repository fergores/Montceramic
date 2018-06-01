<?php
    require "../Negocio/Cliente.php";
?>

<html>
<head></head>
<body>
    
<h1>INSERTAR CLIENTE</h1>

<form action="Cliente_Insertar.php" method="post">
    <table border='2'>
        <tr><td>IdCliente: </td><td><input type="text" name="tbIdCliente"> </td></tr>
        <tr><td>Nombre: </td><td><input type="text" name="tbNombre"></td></tr>
        <tr><td>Correo: </td><td><input type="text" name="tbCorreo"></td></tr>
    </table>
    <br>
    <input type="submit" value="INSERTAR" name="btInsertar">
</form>

<?php

if (isset($_POST['btInsertar'])) {
   $error="";         
   $objCliente = new Cliente($_POST['tbIDCliente'], $_POST['tbNombre'], $_POST['tbCorreo']);
   
   $resultado = $objCliente -> insertar($error);

   // Motrar el resultado de los registro de la base de datos
    if ($resultado)
        echo "Registro Insertado";
    else
        echo "Error en la Inserción: $error";   
}

?>
    
</body>
</html>
