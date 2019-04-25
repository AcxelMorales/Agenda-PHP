<?php
try {
    require_once("funcions/db_conexion.php");
    $sql = "SELECT * FROM contactos";
    $result = $conn -> query($sql);
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
            <h2>Nuevo Contacto</h2>
            <form action="crear.php" method="POST" enctype="application/x-www-form-urlencoded">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="campo">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero">
                </div>
                <input type="submit" value="Agregar" class="btn">
            </form>
        </div>
        <div class="contactos existentes">
            <h1>Contactos Existentes</h1>
            <p>Número de contactos <?=$result->num_rows;?> </p>
            <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Télefono</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                /**
                 * fetch_array
                 * fetch_row
                 * fetch_all
                 */
                while ($registros = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?=$registros['nombre']?></td>
                        <td><?=$registros['telefono']?></td>
                        <td>
                            <a href="editar.php?id= <?=$registros['id']?> ">Editar</a>
                        </td>
                        <td class="borrar">
                            <a href="borrar.php?id= <?=$registros['id']?> ">Borrar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
    <?php $conn->close(); ?>
</body>
</html>
