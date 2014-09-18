<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> codigo rh</td>
        <input  type="number" value="<?php echo ((isset($cod_rh)) ? $cod_rh : '') ?>" id="txtcodRh" name="txtcodRh"  placeholder="codigo rh"><br />
        <td> descripcion rh</td>
        <input type="text" value="<?php echo ((isset($desc_rh)) ? $desc_rh : '') ?>"id="txtDescRh"name="txtDescRh" placeholder="descripcion rh" required><br />


        <input type="submit" value="Enviar"> 
       <td><a type="botton" href="index.php">volver</a></td>
</form>
