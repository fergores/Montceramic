<?php
     require "../Negocio/Cliente.php";
?>

<html>
<head></head>
<body>
    
    <h1>BORRAR / MODIFICAR CLIENTES</h1>

<?php
    $error = "";
    $Cliente = new Cliente();
    $arrayClientes = $Cliente -> Listar($error);
?>

<form action="Cliente_modificar_borrar.php" method="post">
    Pacientes:
    <select name="slClientes">
        <option value=""></option>  
    <?php foreach ($arrayClientes as $pac) { ?>
               <option value="<?php echo $pac->getIdCliente() ?>"><?php echo $pac->getNombre() ?></option>  
    <?php } ?>
    </select>
    <br><br>
    <input type="submit" value="Mostrar" name=btMostrar>

<?php
    if (isset($_POST['btMostrar'], $_POST['slClientes']) and $_POST['slClientes'] != "" ) {

        $Cliente2 = $Cliente -> buscarPorIdCliente($error, $_POST['slClientes']);
?>
        <br><br>
        <table border='2'>
            <tr><td>IdCliente: </td><td><input type="text" name="tbnum" value=<?php echo $Cliente2->getIdCliente() ?>></td></tr>
            <tr><td>IdPieza: </td><td><input type="text" name="tbPieza" value=<?php echo $Cliente2->getIdPieza() ?>></td></tr>
            <tr><td>Nombre: </td><td><input type="text" name="tbNombre" value=<?php echo $Cliente2->getNombre() ?>></td></tr>
            <tr><td>Fecha </td><td><input type="text" name="tbFecha" value=<?php echo $Cliente2->getFecha() ?>></td></tr>
            <tr><td>Correo: </td><td><input type="text" name="tbCorreo" value=<?php echo $Cliente2->getCorreo() ?>></td></tr>
        </table>

        <br>
        <input type="submit" value="MODIFICAR" name="btModificar">
        <input type="submit" value="BORRAR" name="btBorrar">

<?php 
} 
?>

<?php 

    if (isset($_POST['btModificar']) or isset($_POST['btBorrar'])) {

        $objCliente2 = new Cliente ($_POST['tbnum'], $_POST['tbPieza'], $_POST['tbNombre'],$_POST['tbFecha'], $_POST['tbCorreo']);

        if (isset($_POST['btModificar'])) {

            $resultado = $objCliente2 -> modificar($error); 

            if ($resultado)
                echo "Registro Modificado";
            else
                echo "Error en la Modificación: ". $error;
        }

        else {

            $resultado = $objCliente2 -> eliminar($error);
            if ($resultado)
                echo "Registro Elininado";
            else
                echo "Error en la Eliminacion: ". $error;
        }        
       
    }
  
?>




</form>

</body>
</html>
