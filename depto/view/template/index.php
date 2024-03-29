<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de departamento</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body>
        <h1>Gestión de departamento</h1>
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
                    <th>codigo departamento</th>
                    <th>nombre departamento</th>

                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_depto']; ?></td>
                        <td><?php echo $row['nom_depto']; ?></td>



                        <td><a href="index.php?action=update&amp;id=<?php echo $row['cod_depto'] ?>">Modificar</a></td>
                        <td><a  href="index.php?action=delete&amp;id=<?php echo $row['cod_depto'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
          
    </body>
</html>