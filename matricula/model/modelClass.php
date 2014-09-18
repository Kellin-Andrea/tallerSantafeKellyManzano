<?php

class modelClass {

    static public function getMatricula() {
        try {
            $sql = 'SELECT matricula.num_ficha, matricula.id_apren, matricula.estado FROM matricula';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from matricula WHERE matricula.num_ficha = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT matricula.num_ficha FROM matricula WHERE matricula.num_ficha = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from matricula natural join aprendiz ';
            return conexion::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewMatricula($Num, $Id, $Estado) {
        try {
            $sql = "INSERT INTO matricula (num_ficha, id_apre, estado ) VALUES ('$Num', '$Id', '$Estado')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La matricula $Num $Id $Estado   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateMatricula($id, $numFicha, $data) {
        try {

            $sql = "UPDATE matricula SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE num_ficha = '" . $numFicha . "' AND id_apre = '" . $id . "'";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La  matricula no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteMatricula($id) {
        try {

            $sql = 'DELETE FROM matricula WHERE num_ficha = ' . $id;
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