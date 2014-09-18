<?php

class modelClass {

    static public function getDatos() {
        try {
            $sql = 'SELECT datos_usuario.id, datos_usuario.nombre, datos_usuario.apellido, datos_usuario.direccion, datos_usuario.telefono, datos_usuario.localidad_id FROM datos_usuario';

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getUsuario() {
        try {
            $sql = 'SELECT usuario.id, usuario.usuario, usuario.password, usuario.activado from usuario';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getLocalidad() {
        try {
            $sql = 'SELECT localidad.id, localidad.nombre, localidad.localidad_id FROM localidad';
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from datos_usuario WHERE datos_usuario.id = ' . $id;

            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT datos_usuario.id FROM datos_usuario WHERE datos_usuario.id = ' . $id;
            return conexion::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from datos_usuario';
            return conexion::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewDatos($Id, $Usuario, $Nombre, $Apell, $Dire, $Tele, $LocaId) {
        try {
            $sql = "INSERT INTO datos_usuario (id, usuario_id, nombre, apellido, direccion, telefono, localidad_id ) VALUES ('$Id', '$Usuario', '$Nombre', '$Apell', '$Dire', '$Tele', '$LocaId')";


            conexion::getInstance()->beginTransaction();
            $rsp = conexion::getInstance()->exec($sql);
            conexion::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("Los datos $Id $Usuario $Nombre   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateDatos($id, $data) {
        try {

            $sql = "UPDATE datos_usuario SET ";

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
                throw new PDOException("Los datos no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            conexion::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteDatos($id) {
        try {

            $sql = 'DELETE FROM datos_usuario WHERE id = ' . $id;

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