<?php
    $servername = "localhost:3306"; // Dirección y puerto del servidor de la base de datos
    $username = "root"; // Nombre de usuario para la conexión a la base de datos
    $password = ""; // Contraseña para la conexión a la base de datos
    $db = 'littledata'; // Nombre de la base de datos a la que se desea conectar

    $conexion = new mysqli($servername, $username, $password, $db); // Crear una nueva conexión a la base de datos utilizando los datos anteriores

    if ($conexion->connect_error) { // Verificar si la conexión ha fallado
        die("Connection failed: " . $conexion->connect_error); // Si la conexión ha fallado, mostrar un mensaje de error y terminar el programa
    }
    
    if (isset($_POST['username']) && isset($_POST['password'])) { // Verificar si las variables 'username' y 'password' han sido enviadas mediante un formulario POST
        $sql = "SELECT * FROM usuarios WHERE username=? AND password=?"; // Crear una consulta SQL para buscar un usuario 
        // en la base de datos con el nombre de usuario y contraseña proporcionados
        $stmt = $conexion->prepare($sql); // Preparar la consulta SQL para su ejecución

        $stmt->bind_param("ss", $_POST['username'], $_POST['password']); // Vincular los valores de los parámetros en la consulta preparada

        $stmt->execute(); // Ejecutar la consulta
        $result = $stmt->get_result(); // Obtener el resultado de la consulta

        if ($result->num_rows == 1) { // Verificar si se encontró exactamente un registro en la base de datos que coincida con el nombre de usuario y la contraseña proporcionados
            header('Location: ../PaginaWeb/index.html'); // Redirigir al usuario a la página principal del sitio web
            exit(); // Finalizar la ejecución del programa
        } else {
            header('Location: indexerror.html'); // Si no se encontró un registro coincidente, redirigir a una página de error
        }

        $stmt->close(); // Cerrar la consulta preparada
    }

    $conexion->close(); // Cerrar la conexión a la base de datos
?>
