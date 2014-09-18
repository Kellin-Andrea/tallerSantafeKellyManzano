<?php

/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla uusario credencial
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */

class modelClass {
/**
   * esta funcion nos permitira vizualizar la sentencia de la tabla usuario credencial
   * @param type $Id se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function getUsuario_credencial() {
        try {
            $sql = 'SELECT usuario_credencial.id, usuario_credencial.usuario_id, usuario_credencial.credencial_id FROM usuario_credencial';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getcredencial() {
        try {
           $sql = 'SELECT credencial.id, credencial.nombre FROM credencial';
            
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *esta funcion trae todos los datos de la tabla credencial que la utilizamos como un select en el formulario
     * 
     * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from usuario_credencial WHERE usuario_credencial.id = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /**
     *@param type $Id se define como la llave primaria
     * 
     * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function certifyId($id) {
        try {
            $sql = 'SELECT usuario_credencial.id FROM usuario_credencial WHERE usuario_credencial.id = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    /** esta funccion trae todos los datos de nuestro formulario y consigo los lleva a la base de daatos
     * 
     * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getAll() {
        try {
            $sql = 'SELECT * from usuario_credencial';
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
   * @param type $id se define como la llave primaria
   * @param type $usuario se define como usuario
   * @param type $CredeId se define como credencial_id
  
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */
    static public function NewUsu($Id, $Usuario, $CredeId) {
        try {
            $sql = "INSERT INTO usuario_credencial (id, usuario_id, credencial_id ) VALUES ($Id, $Usuario, $CredeId)";



            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El usuario_credencial $Id $Usuario   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }
    /** en este metodo se ejecuta el update
 * @param type $id se define esta variable con la llave primaria de la tabla
 * @param type $data se define esta variable como un array por medio del forech
 * @return \PDOException|boolean ??
 *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    

    static public function updateUsu($id, $data) {
        try {

            $sql = "UPDATE usuario_credencial SET ";

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
                throw new PDOException("El usuario_credencial no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteUsu($id) {
        try {

            $sql = 'DELETE FROM usuario_credencial WHERE id = ' . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El usuario_credencial no ha podido ser eliminado", 2633);
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

}

?>