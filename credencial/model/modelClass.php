<?php

/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla credencial
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */
class modelClass {
  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla credencial
   * @param type $Id se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function getCredencial() {
        try {
            $sql = 'SELECT credencial.id, credencial.nombre FROM credencial';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla credencial que la utilizamos en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from credencial WHERE credencial.id = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *@param type $Id se define como la llave primaria
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function certifyId($id) {
        try {
            $sql = 'SELECT credencial.id FROM credencial WHERE credencial.id = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from credencial ';
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
   * @param type $Id se define como la llave primaria
   * @param type $Nombre se define como nombre
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function NewCredencial($Id, $Nombre) {
        try {
            $sql = "INSERT INTO credencial (id, nombre ) VALUES ('$Id', '$Nombre')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La credencial $Id $Nombre   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }
    /** en este metodo se ejecuta el update
 * @param type $Id se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function updateCredencial($id, $data) {
        try {

            $sql = "UPDATE credencial SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE id = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La credencial no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCredencial($id) {
        try {

            $sql = 'DELETE FROM credencial WHERE id = ' . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El aprendiz no ha podido ser eliminado", 2633);
            }

            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

}

?>