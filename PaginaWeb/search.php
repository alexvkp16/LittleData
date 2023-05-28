<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;500&family=Poppins:wght@400;600;800;900&display=swap" rel="stylesheet">
</head>
<body>

<div class="topnav">
  <img src="Logo.png" height="59px" class="imagenlogo">
  <div class="topnav-buttons">
    <a class="active" href="index.html">Home</a>
    <a href="Clientes/compis.html">Clientes</a>
    <a href="Trabajadores/compis.html">Trabajadores</a>
    <a href="Usuarios/compis.html">Usuarios</a>
    <a href="Facturas/compis.html">Facturas</a>
    <a href="modificar.html">Modificar</a>
  </div>
  <div class="login">
    <a href="../Login/index.html">Login / Register</a>
    <form action="search.php" method="POST">
      <input type="text" name="nif_cliente" placeholder="Buscar..Cliente" class="search-bar">
  </form>
  </div>
</div>
<br><br>
  <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $db = 'littledata';

    $conexion = new mysqli($servername, $username, $password, $db);
    $consulta=$conexion->query("SELECT * FROM clientes WHERE nif_cliente='".$_POST['nif_cliente']."' ");
  ?>
    <table border=1>
        <tr>
            <th>Nif Del Cliente</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Fecha De Alta</th>
        </tr>
   
   <?php

    while($registro=$consulta->fetch_object())   
    {	
        echo '<td>'.$registro->nif_cliente.'</td>';
        echo '<td>' .$registro->nombre. '</td>';
        echo '<td>' .$registro->email. '</td>';
        echo '<td>' .$registro->direccion. '</td>';
        echo '<td>' .$registro->fecha_de_alta. '</td></tr>';
    }
    
   ?>

 </body>
</html>