<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

try {
    require_once("funcions/db_conexion.php");

    $sql = "DELETE FROM contactos WHERE id={$id}";
    $result = $conn->query($sql);

} catch (Exception $e) {
    $error = $e -> getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
</head>
<body>
    <div class="contenedor">
        <h1>Agenda de Contactos</h1>
        <div class="contenido">
            <?php
            if ($result) {
                echo 'Contacto eliminado';
            } else {
                $conn->error;
            }
            ?>
            <br>
            <a class="volver" href="index.php">Volver a la agenda</a>
        </div>
    </div>
    <?php
    $conn->close();
    ?>
</body>
</html>