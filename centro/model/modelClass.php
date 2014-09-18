<?php

/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla centro
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */
class modelClass {
  
  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla centro
   * @param type $Cod se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function getCentro() {
        try {
            $sql = 'SELECT centro.cod_centro, centro.desc_centro, centro.tel, centro.dir, centro.cod_ciudad FROM centro';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla centro que la utilizamos en nuestro formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getCiudad() {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad, ciudad.cod_depto, ciudad.habitantes  FROM ciudad';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla ciudad que la utilizamos como un select en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from centro WHERE centro.cod_centro = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    /**
     *@param type $Cod se define como la llave primaria
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function certifyId($id) {
        try {
            $sql = 'SELECT centro.cod_centro FROM centro WHERE centro.cod_centro = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from centro ';
            return conexion::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
              /*
        if($e->getCode() === 10) {
        echo 'Base de Datos no encotrada';
        }
       */
        }
    }

    /**
   * 
   * @param type $Cod se define como la llave primaria
   * @param type $Desc se define como desc_centro
   * @param type $Tel se define como tel
   * @param type $Dir se define como dir
   * @param type $CodCiud se define como cod_ciudad
  
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */
    static public function NewCentro($Cod, $Desc, $Tel, $Dir, $CodCiud) {
        try {
            $sql = "INSERT INTO centro (cod_centro, desc_centro, tel, dir, cod_ciudad ) VALUES ('$Cod', '$Desc', '$Tel', '$Dir', '$CodCiud')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El centro $Cod $Desc $Tel   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    /** en este metodo se ejecuta el update
 * @param type $Cod se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    static public function updateCentro($id, $data) {
        try {

            $sql = "UPDATE centro SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_centro = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El centro no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCentro($id) {
        try {

            $sql = 'DELETE FROM centro WHERE cod_centro = ' . $id;
            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                $rsp = false;
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

}

?>