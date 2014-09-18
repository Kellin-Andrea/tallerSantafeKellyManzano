<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> codigo tipo_id</td>
        <input  type="number" value="<?php echo ((isset($cod_tipo_id)) ? $cod_tipo_id : '') ?>" id="txtcod" name="txtcod"  placeholder="codigo tipo_id"><br />
        <td> descripcion tipo_id</td>
        <input type="text" value="<?php echo ((isset($desc_tipo_id)) ? $desc_tipo_id : '') ?>"id="txtDesc"name="txtDesc" placeholder="descripcion tipo_id" required><br />


        <input type="submit" value="Enviar"> 
      <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
