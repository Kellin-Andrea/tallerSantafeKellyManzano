<?php
/**esta clase lo utilizaremos para realizar la sentecia de la tabla causa DEsercion
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */
class modelClass {
  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla causa Desercion 
   * @param type $-cod se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function getCausaDeser() {
        try {
            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla causaDesercion que la utilizamos para el  formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getRow($id) {
        try {

            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion WHERE causa_desercion.cod_causa= ' . $id;
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
            $sql = 'SELECT causa_desercion.cod_causa  FROM causa_desercion WHERE causa_desercion.cod_causa=  ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion';
            return conexion::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
     /**
   * 
   * @param type $cod se define como la llave primaria
   * @param type $descCausa se define como desc_causa
   * @param type $estado se define como estado
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function NewCausa($cod, $descCausa, $estado) {
        try {
            $sql = "INSERT INTO causa_desercion (cod_causa, desc_causa, estado) VALUES ('$cod', '$descCausa', '$estado')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La Causa $cod $descCausa   está siendo usado");
            }

            return $rsp;
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
 * @param type $Cod se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function updateCausa($id, $data) {
        try {

            $sql = "UPDATE causa_desercion SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_causa = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La Causa no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCausa($id) {
        try {

            $sql = 'DELETE FROM causa_desercion WHERE cod_causa = ' . $id;

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