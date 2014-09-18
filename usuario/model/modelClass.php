<?php
/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla usuario
 * 
 * @author Kelly Andrea Manzano Muñoz <kellinandrea198@hotmail.com
 * 
 */

class modelClass {
  /**
   * esta funcion nos permitira vizualizar la sentencia de la tabla aprendiz 
   * @param type $Id se define esta variable como la llave primaria de la tabla 
   * @return \PDOException devuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function getRow($id) {
        try {
            $sql = 'SELECT usuario.id, usuario.usuario, usuario.activado FROM usuario WHERE usuario.id = ' . $id;
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
            $sql = 'SELECT usuario.id FROM usuario WHERE usuario.id = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
    static public function updateUsu($id, $data) {
        try {

            $sql = "UPDATE usuario SET ";

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
                throw new PDOException("El usuario no ha podido ser actualizado", 2632);
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }
    

    static public function deleteUsu($id) {
        try {

            $sql = "DELETE FROM usuario WHERE id = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El usuario no ha podido ser eliminado", 2633);
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }
    /**
 * esta  funcion trae todos los datos de la tabla aprendiz con base a una sentencia
* @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    static public function getAll() {
        try {
            $sql = 'SELECT usuario.id, usuario.usuario, usuario.activado FROM usuario';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
        /**
   * 
   * @param type $usu se define como la llave primaria
   * @param type $password se define password
   * @param type $activate se define activate
 
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */

    static public function NewUsu($usu, $password, $activate) {
        try {
            $sql = "INSERT INTO usuario (usuario, password, activado) VALUES ('$usu', '" . md5($password) . "', $activate)";
            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El usuario $usu está siendo usado", 2745);
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}
