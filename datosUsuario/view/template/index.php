<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de datos</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body>
        <h1>Gestión de datos</h1>
        <div id="lnkNuevo">
            <a href="index.php?action=create">Nuevo</a>
             <td> <a href="/mitaller" title="Regresar al inicio">Home</a></td>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error ?></div>
        <?php endif ?>

        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success ?></div>
        <?php endif ?>

        <table id="tblContenido">
            <thead>
                <tr>
                    <th>id</th>
                    <th>usuario</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>localidad</th>

                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['usuario_id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['localidad_id']; ?></td> 

                        <td><a href="index.php?action=update&amp;id=<?php echo $row['id'] ?>">Modificar</a></td>
                        <td><a  href="index.php?action=delete&amp;id=<?php echo $row['id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
          
    </body>
</html>