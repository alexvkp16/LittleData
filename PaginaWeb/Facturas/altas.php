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
    <?php
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $db = 'littledata';
    
        $conexion = new mysqli($servername, $username, $password, $db);
        $consulta=$conexion->query("insert into compis (id_alumno, nombre, ape1, ape2, direccion, poblacion, cp)
        values ('".$_POST['id_alumno']."','".$_POST['nombre']."','".$_POST['ape1']."','".$_POST['ape2']."','".$_POST['direccion']."','".$_POST['poblacion']."','".$_POST['cp']."')");
        print "<h2>Datos introducidos</h2><br>";
        echo   $_POST['id_alumno'],"<br>",$_POST['nombre']."&nbsp;",$_POST['ape1'],"<br>",$_POST['ape2'],"<br>",$_POST['direccion'],"<br>",$_POST['poblacion'],"<br>",$_POST['cp'];
    ?>
    <br>
    <br>
    <br>
    <?php
    $conexion->close();
    ?>
</body>
</html>