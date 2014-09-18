<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> codigo depto</td>
        <input  type="number" value="<?php echo ((isset($cod_depto)) ? $cod_depto : '') ?>" id="txtcod" name="txtcod"  placeholder="codigo departamento"><br />
        <td> nombre depto</td>
        <input type="text" value="<?php echo ((isset($nom_depto)) ? $nom_depto : '') ?>"id="txtnom"name="txtnom" placeholder="nombre departamento" required><br />


        <input type="submit" value="Enviar"> 
       <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
