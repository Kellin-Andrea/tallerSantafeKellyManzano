<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> identificacion</td>
        <input  type="number" value="<?php echo ((isset($id)) ? $id : '') ?>" id="txtId" name="txtId"  placeholder="ingresar identificacion"><br />
        <td> nombre </td>
        <input type="text" value="<?php echo ((isset($nombre)) ? $nombre : '') ?>"id="txtNombre"name="txtNombre" placeholder="ingresar nombre " required><br />


        <input type="submit" value="Enviar"> 
        <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
