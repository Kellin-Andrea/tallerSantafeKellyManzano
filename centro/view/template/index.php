<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de centro</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body>
        <h1>Gestión de centro</h1>
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
                    <th>codigo centro</th>
                    <th>descripcion centro</th>
                    <th>telefono</th>
                    <th>direccion</th>
                    <th>codigo ciudad</th>

                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_centro']; ?></td>
                        <td><?php echo $row['desc_centro']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                        <td><?php echo $row['dir']; ?></td>
                        <td><?php echo $row['cod_ciudad']; ?></td>



                        <td><a href="index.php?action=update&amp;id=<?php echo $row['cod_centro'] ?>">Modificar</a></td>
                        <td><a  href="index.php?action=delete&amp;id=<?php echo $row['cod_centro'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
     
    </body>
</html>