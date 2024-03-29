<?php

class modelClass {

    static public function getDepto() {
        try {
            $sql = 'SELECT deoto.cod_depto, depto.nom_depto FROM depto';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from depto WHERE depto.cod_depto = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT depto.cod_depto FROM depto WHERE depto.cod_depto = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from depto ';
            return conexion::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewDepto($cod, $nomDepto) {
        try {
            $sql = "INSERT INTO depto (cod_depto, nom_depto ) VALUES ('$cod', '$nomDepto')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El departamento $cod $nomDepto   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateDepto($id, $data) {
        try {

            $sql = "UPDATE depto SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_depto = " . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El departamento no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteDepto($id) {
        try {

            $sql = 'DELETE FROM depto WHERE cod_depto = ' . $id;

            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

}

?>