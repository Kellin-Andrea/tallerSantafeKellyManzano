<form action="<?php echo $formAction ?>" method="POST" nom="formu">
    <div>
        <table>
            <tr>
                <td> Codigo Ciudad</td>
                <td><input type="number" value="<?php echo ((isset($cod_ciudad)) ? $cod_ciudad : '') ?>" id="codCity" name="codCity" placeholder="ingresar codigo ciudad" required</td> <br />
            </tr>
            <tr>
                <td> Ciudad</td>
                <td><input type="text" value="<?php echo ((isset($nom_ciudad)) ? $nom_ciudad : '') ?>" id="nameCity" name="nameCity" placeholder="ingresar nombre ciudad" required><br />
            </tr>
            <tr>
                <td> Departamento</td>
                <td><select id="txtDepto"name="txtDepto"required>
                        <option value="">---Seleccionar---</option>
                        <?php foreach ($depto as $dato): ?>
                            <option value="<?php echo $dato['cod_depto'] ?>"><?php echo $dato['nom_depto'] ?></option>
                    <?php endforeach ?></td>
                </select>
            </tr>
            <tr>
                <td> Habitantes</td>
                <td><input  type="number" value="<?php echo ((isset($habitantes)) ? $habitantes : '') ?>" id="txtHabi" name="txtHabi" placeholder="ingresar habitantes" required><br />
            </tr>
            <td><input type="submit" value="Enviar"> </td>
    <td><a type="botton" href="index.php">volver</a></td>
        </table>
    </div>
</form>


