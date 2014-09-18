<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <table
            <tr>
        <td> Identificacion</td>
        <td><input  type="number" value="<?php echo ((isset($id_apre)) ? $id_apre : '') ?>" id="txtId" name="txtId"  placeholder="Identificacion del Aprendiz"><br /></td>
        </tr>
        <tr>
        <td> Nombre Completo</td>
        <td><input type="text" value="<?php echo ((isset($nom_apre)) ? $nom_apre : '') ?>"id="txtName"name="txtName" placeholder="ingresar nombre" required><br /></td>
        </tr>
        <tr>
        <td> Apellido Completo</td>
        <td><input type="text"value="<?php echo ((isset($apell_apre)) ? $apell_apre : '') ?>" id="txtLastName" name="txtLastName" placeholder="ingresar apellido" required><br /></td>
        </tr>
        <tr>
        <td> Telefono</td>
        <td><input type="number"value="<?php echo ((isset($tel_apre)) ? $tel_apre : '') ?>" id="txtPhone" name="txtPhone" placeholder="telefono" required><br /></td>
        </tr>
        <tr>
        <td> ciudad</td>
        <td><select id="txtCity" name="txtCity" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($ciudad as $dato): ?>
                <option value="<?php echo $dato['cod_ciudad'] ?>" selected><?php echo $dato['nom_ciudad'] ?></option>           
            <?php endforeach ?>
            </select><br /></td>
        </tr>
        <tr>
        <td>Rh</td>
        <td><select id="txtRh" name="txtRh" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($rh as $dato): ?>
                <option value="<?php echo $dato['cod_rh'] ?>" selected><?php echo $dato['desc_rh'] ?></option>
            <?php endforeach ?>
            </select><br /></td>
        </tr>
        <tr>
        <td>Tipo documento</td>
        <td><select id="txtTypeId"name="txtTypeId" required>
            <option value="">---Seleccionar---</option>
            <?php foreach ($tipo_id as $dato): ?>
                <option value="<?php echo $dato['cod_tipo_id'] ?>"selected><?php echo $dato['desc_tipo_id'] ?></option>
            <?php endforeach ?>
            </select><br /></td>
        </tr>
        <tr>
        <td> Genero</td>
        <td><select id="txtGender" name="txtgender" requires>
            <option value="">---Seleccionar---</option>
            <option value="F">Femenino</option>
            <option value="M">Maculino</option>
            </select><br /></td>
        </tr>
        <tr>
        <td> Edad</td>
        <td><input type="number" value="<?php echo ((isset($edad)) ? $edad : '') ?>"id="txtAge"name="txtAge" placeholder="edad" required><br /></td>
        </tr>
        <tr>
            <td><input type="submit" value="Enviar"></td>
          <td><a type="botton" href="index.php">volver</a></td>       
        </tr>
    </table>

    </div>
</form>
