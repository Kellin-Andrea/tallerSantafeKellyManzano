<?php
/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla ciudad
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */


class modelClass {

  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla ciudad 
   * @param type $Cod se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function viewCity($id) {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad, ciudad.habitantes FROM ciudad WHERE ciudad.cod_ciudad = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla ciudad que la utilizamos  en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function certifyId($id) {
        try {
            $sql = 'SELECT ciudad.cod_ciudad FROM ciudad WHERE ciudad.cod_ciudad = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
/**
     *esta funcion trae todos los datos de la tabla depto que la utilizamos como un select en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    static public function getDepto() {
        try {
            $sql = 'SELECT depto.cod_depto, depto.nom_depto FROM depto';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad, ciudad.habitantes, ciudad.cod_depto FROM ciudad ';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
            /*
              if($e->getCode() === 10) {
              echo 'Base de Datos no encotrada';
              }
             */
        }
    }
    /** en este metodo se ejecuta el update
 * @param type $cod se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    

    static public function updateCity($id, $data) {
        try {

            $sql = "UPDATE ciudad SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_ciudad = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("la cxiudad no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }
     /**
     *@param type $Cod se define como la llave primaria
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    

    static public function getRow($id) {
        try {

            $sql = 'SELECT ciudad.cod_ciudad, ciudad.cod_depto, ciudad.nom_ciudad, ciudad.habitantes, depto.nom_depto from ciudad, depto  WHERE ciudad.cod_depto=depto.cod_depto and  ciudad.cod_ciudad = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function deleteCity($id) {
        try {

            $sql = "DELETE FROM ciudad WHERE cod_ciudad = " . $id;

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
    /**
   * 
   * @param type $id se define como la llave primaria
   * @param type $nom se define como nom_ciudad
   * @param type $depto se define como cod_depto
   * @param type $habitantes se define como habitantes

   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function newCity($id, $nom, $depto, $habitantes) {
        try {
            $sql = "INSERT INTO ciudad (cod_ciudad, nom_ciudad, cod_depto, habitantes ) VALUES ('$id', '$nom', '$depto', '$habitantes')";
            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El Ciudad $id $nom $depto  está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}

?>