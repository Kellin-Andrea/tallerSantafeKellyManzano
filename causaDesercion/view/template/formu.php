<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> codigo Causa</td>
        <input  type="number" value="<?php echo ((isset($cod_causa)) ? $cod_causa : '') ?>" id="txtcod" name="txtcod"><br />
        <td> Causas Desercion</td>
        <input type="text" value="<?php echo ((isset($desc_causa)) ? $desc_causa : '') ?>"id="txtnom"name="txtnom"  required><br />
        <td> Estado</td>
        <input type="text" value="<?php echo ((isset($estado)) ? $estado : '') ?>"id="txtes"name="txtes"  required><br />


        <input type="submit" value="Enviar"> 
        <td><a type="botton" href="index.php">volver</a></td>
    </div>
</form>
