<?php
    require "../Negocio/Cliente.php";
?>

<html>
<head></head>
<body>
    
    <h1>Clientes</h1>

<?php  
    $error="";
    $Cliente = new Cliente();
    $arrayClientes = $Cliente-> Listar($error); 

    if ($error=="") {
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>IdCliente</th>";
        echo "<th>IdPieza</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>FECHA</th>";
        echo "<th>CORREO</th>";
        echo "</tr>";

        foreach ($arrayClientes as $pac) {
            echo "<tr>";
            echo "<td>" . $pac->getIdCliente()."</td>";
            echo "<td>" . $pac->getIdPieza()."</td>";
            echo "<td>" . $pac->getNombre() . "</td>";
            echo "<td>" . $pac->getFecha()."</td>";
            echo "<td>" . $pac->getCorreo(). "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    else
        echo "ERRO: $error";
  

?>
    
</body>
</html>
