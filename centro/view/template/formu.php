<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> centro</td>
        <input  type="number" value="<?php echo ((isset($cod_centro)) ? $cod_centro : '') ?>" id="txtCod" name="txtCod"  placeholder="centro"><br />
        <td> descripcion centro </td>
        <input type="text" value="<?php echo ((isset($desc_centro)) ? $desc_centro : '') ?>"id="txtDesc"name="txtDesc" placeholder="descripcion del centro" required><br />
        <td> telefono </td>
        <input type="number" value="<?php echo ((isset($tel)) ? $tel : '') ?>"id="txtTel"name="txtTel" placeholder="ingresa telefono" required><br />
        <td> direccion </td>
        <input type="text" value="<?php echo ((isset($dir)) ? $dir : '') ?>"id="txtDir"name="txtDir" placeholder="ingresa direccion" required><br />
        <td> ciudad </td>
        <select id="txtCodCiud" name="txtCodCiud" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($ciudad as $dato): ?>
                <option value="<?php echo $dato['cod_ciudad'] ?>" selected><?php echo $dato['nom_ciudad'] ?></option>           
            <?php endforeach ?>
        </select><br />

        <input type="submit" value="Enviar"> 
       <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
