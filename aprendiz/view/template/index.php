<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión de usuarios</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body>
        <h1>Gestión de Aprendiz</h1>
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
                    <th>Id aprendiz</th>
                    <th>Nombre aprendiz</th>
                    <th>apellido aprediz</th>
                    <th>telefono aprendiz</th>
                    <th>codigo de ciudad</th>
                    <th>codigo tipo id</th>
                    <th>codigo rh</th>
                    <th>genero</th>
                    <th>edad</th>
                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['id_apre']; ?></td>
                        <td><?php echo $row['nom_apre']; ?></td>
                        <td><?php echo $row['apell_apre']; ?></td>
                        <td><?php echo $row['tel_apre']; ?></td>
                        <td><?php echo $row['nom_ciudad']; ?></td>
                        <td><?php echo $row['desc_tipo_id']; ?></td>
                        <td><?php echo $row['desc_rh']; ?></td>
                        <td><?php echo $row['genero']; ?></td>
                        <td><?php echo $row['edad']; ?></td>


                        <td><a href="index.php?action=update&amp;id=<?php echo $row['id_apre'] ?>">Modificar</a></td>
                        <td><a  href="index.php?action=delete&amp;id=<?php echo $row['id_apre'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        
        </table>
       
    </body>
</html>