<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas preparadas</title>
</head>
<body>
    <?php
        $server = "localhost";
        $user = "root";
        $password = " ";
        $dbname = "ejemploPreparadas";
        // Conectar
        $db = new mysqli($server, $user, $password, $dbname);
        // Comprobar conexión
        if($db->connect_error){
            die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
        }

        // Preparar
        $resultado = $db->prepare("INSERT INTO Clientes (nombre, ciudad, contacto) VALUES (?, ?, ?)");
        $resultado->bind_param('ssi', $nombre, $ciudad, $contacto);
        // Establecer parámetros y ejecutar
        $nombre = "Jose Juan";
        $ciudad = "Badajoz";
        $contacto = 612323123;
        $resultado->execute();
        $nombre = "Miguel Angel";
        $ciudad = "Madrid";
        $contacto = 623123123;
        $resultado->execute();
        // Mensaje de éxito en la inserción
        echo "Se han creado las entradas exitosamente";
        // Cerrar conexiones
        $resultado->close();
        $db->close();
    ?>
</body>
</html>