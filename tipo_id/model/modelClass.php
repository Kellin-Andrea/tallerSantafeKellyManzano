<?php
/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla Rh
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */

class modelClass {
  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla rh
   * @param type $cod se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function gettipo_id() {
        try {
            $sql = 'SELECT tipo_id.cod_tipo_id, tipo_id.desc_tipo_id FROM tipo_id';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    /**
     *esta funcion trae todos los datos de la tabla ciudad que la utilizamos en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    static public function getRow($id) {
        try {

            $sql = 'SELECT * from tipo_id WHERE tipo_id.cod_tipo_id = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *@param type $cod se define como la llave primaria
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function certifyId($id) {
        try {
            $sql = 'SELECT tipo_id.cod_tipo_id FROM tipo_id WHERE tipo_id.cod_tipo_id = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
 * esta  funcion trae todos los datos de la tabla aprendiz con base a una sentencia
     * 
     * @return \PDOException* @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getAll() {
        try {
            $sql = 'SELECT * from tipo_id ';
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
   * @param type $cod se define como la llave primaria
   * @param type $desc se define como desc_rh
   
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */
    static public function NewTipo_id($cod, $desc) {
        try {
            $sql = "INSERT INTO tipo_id (cod_tipo_id, desc_tipo_id ) VALUES ('$cod', '$desc')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El tipo_id $cod $desc   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }
    /** en este metodo se ejecuta el update
 * @param type $cod se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    

    static public function updateTipo_id($id, $data) {
        try {

            $sql = "UPDATE tipo_id SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_tipo_id = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El tipo_id no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteTipo_id($id) {
        try {

            $sql = 'DELETE FROM tipo_id WHERE cod_tipo_id = ' . $id;
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