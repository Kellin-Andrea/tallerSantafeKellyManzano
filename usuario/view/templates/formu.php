<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <div>
        <td> usuario</td>
        <input  type="text" value="<?php echo ((isset($Usurio)) ? $Usurio : '') ?>" id="txtUsuario" name="txtUsuario"  placeholder="ingresa usuario" required=""><br />
        <td> password</td>
        <input type="number" value="<?php echo ((isset($password1)) ? $password1 : '') ?>"id="txtPassword1"name="txtPassword1" placeholder="ingresa contraseña" required><br />
        <td> repetir contraseña</td>
        <input type="number" value="<?php echo ((isset($password2)) ? $password2 : '') ?>"id="txtPassword2"name="txtPassword2" placeholder="ingresa contraseña" required><br />   
        <td>Activado</td>
        <input type="radio" name="rdoActivado" id="rdoActivadoSi" value="true" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'true') ? 'checked' : '') : '') ?> required> Si
        <input type="radio" name="rdoActivado" id="rdoActivadoNo" value="false" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'false') ? 'checked' : '') : '') ?> required> No
    </div>
</div>
</div>
<div>
    
    <button type="submit">enviar</button>
    <td><a type="botton" href="index.php">volver</a></td>
</div>
</form>