<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> identificacion</td>
        <input  type="number" value="<?php echo ((isset($id)) ? $id : '') ?>" id="txtId" name="txtId"  placeholder="ingresa identificacion"><br />
        <td> usuario</td>
        <input type="number" value="<?php echo ((isset($usuario_id)) ? $usuario_id : '') ?>"id="txtUsuario"name="txtUsuario" placeholder="ingresa usuario " required><br />
        <td> credencial</td>
        <td><select id="txtCredeId" name="txtCredeId" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($credencial as $dato): ?>
                <option value="<?php echo $dato['id'] ?>" selected><?php echo $dato['nombre'] ?></option>           
            <?php endforeach ?>
            </select><br /></td>


        <input type="submit" value="Enviar"> 
        <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
