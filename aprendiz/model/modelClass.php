<?php

/**
 * esta clase lo utilizaremos para realizar la sentecia de la tabla aprendiz
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

    static public function getcity() {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad,ciudad.cod_depto,ciudad.habitantes FROM ciudad';
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

    static public function getRh() {
        try {
            $sql = 'SELECT rh.cod_rh, rh.desc_rh FROM rh';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

     /**
     *esta funcion trae todos los datos de la tabla Rh que la utilizamos como un select en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */
    static public function getTypeId() {
        try {
            $sql = 'select tipo_id.cod_tipo_id, tipo_id.desc_tipo_id from tipo_id';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
     /**
     *esta funcion trae todos los datos de la tabla typeId que la utilizamos como un select en el formulario
     * 
     * @return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
     */

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from aprendiz natural join ciudad natural join rh natural join tipo_id WHERE aprendiz.id_apre = ' . $id;

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
            $sql = 'SELECT aprendiz.id_apre FROM aprendiz WHERE aprendiz.id_apre = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from aprendiz natural join ciudad natural join tipo_id natural join rh ';
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
   * @param type $nom se define como nom_apre
   * @param type $apell se define como apell_apre
   * @param type $tel se define como tel_apre
   * @param type $ciudad se define como cod_ciudad
   * @param type $rh se define como cod_rh
   * @param type $tipoId se define como cod_tipo_id
   * @param type $genero se define cocmo  genero
   * @param type $edad se define como edad
   * 
   *@return \PDOException evuelve un mensaje de exito si la funcion fue realizada si es el caso y la funcion no fue realiza envia mensaje no se puede procesar
   */
    
    static public function NewApre($id, $nom, $apell, $tel, $ciudad, $rh, $tipoId, $genero, $edad) {
        try {
            $sql = "INSERT INTO aprendiz (id_apre, nom_apre, apell_apre,tel_apre,cod_ciudad,cod_rh,cod_tipo_id,genero,edad ) VALUES ('$id', '$nom', '$apell', '$tel', '$ciudad', '$rh', '$tipoId', '$genero', '$edad')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El aprendiz $id $nom $apell  está siendo usado");
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
    
    static public function updateApren($id, $data) {
        try {

            $sql = "UPDATE aprendiz SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE id_apre = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El aprendiz no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteAprendiz($id) {
        try {

            $sql = 'DELETE FROM aprendiz WHERE id_apre = ' . $id;

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