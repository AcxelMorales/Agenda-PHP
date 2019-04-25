<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

try {
    require_once("funcions/db_conexion.php");
    $sql = "SELECT * FROM contactos WHERE id = {$id}";
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
            <h2>Editar Contacto</h2>
            <form action="actualizar.php" method="GET" enctype="application/x-www-form-urlencoded">
            <?php while ($registro = $result->fetch_assoc()) { ?>
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" value="<?=$registro['nombre']?>" name="nombre" id="nombre">
                </div>
                <div class="campo">
                    <label for="numero">Número</label>
                    <input type="text" value="<?=$registro['telefono']?>" name="numero" id="numero">
                </div>
                <input type="hidden" name="id" value="<?=$registro['id']?>">
                <input type="submit" value="Editar" class="btn">
            <?php } ?>
            </form>
        </div>
    </div>
    <?php $conn->close(); ?>
</body>
</html>