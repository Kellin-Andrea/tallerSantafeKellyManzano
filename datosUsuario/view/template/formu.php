<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>

        <td> identificancion</td>
         <input type="number" value="<?php echo ((isset($id)) ? $id : '') ?>"id="txtId"name="txtId" placeholder="ingrese usuario" required><br />

        <td> usuario</td>
       <td><select id="txtId" name="txtId" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($usuario as $dato): ?>
                <option value="<?php echo $dato['id'] ?>" selected><?php echo $dato['id'] ?></option>           
            <?php endforeach ?>
            </select><br /></td>
        <td> nombre</td>
        <input type="text" value="<?php echo ((isset($nombre)) ? $nombre : '') ?>"id="txtNombre"name="txtNombre" placeholder="ingrese nombre" required><br />

        <td> apellido</td>
        <input type="text" value="<?php echo ((isset($apellido)) ? $apellido : '') ?>"id="txtApell"name="txtApell" placeholder="ingrese apellido" required><br />

        <td> direccion</td>
        <input type="text" value="<?php echo ((isset($direccion)) ? $direccion : '') ?>"id="txtDire"name="txtDire" placeholder="ingrese direccion" required><br />

        <td> telefono</td>
        <input type="number" value="<?php echo ((isset($telefono)) ? $telefono : '') ?>"id="txtTele"name="txtTele" placeholder="ingrese telefono" required><br />

        <td> localidad</td>
      <td><select id="txtLocaId" name="txtLocaId" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($localidad as $dato): ?>
                <option value="<?php echo $dato['id'] ?>" selected><?php echo $dato['nombre'] ?></option>           
            <?php endforeach ?>
            </select><br /></td>

        <input type="submit" value="Enviar"> 
    <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
