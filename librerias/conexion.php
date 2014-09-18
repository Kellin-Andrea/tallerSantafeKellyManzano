<?php

/**
 *
 * clase con la cual se va a conectar a base de datos
 *
 */
class conexion {

    /**
     *
     * variable que nos muestra cual es la direccion de la base de datos
     */
    static private $host = 'localhost';

    /**
     *
     * variable por la cual nos muestra en nombre de nuestra base de datos
     */
    static private $dbname = 'trabajo',
            $user = 'root',
            $password = '',
            $driver = 'mysql',
            $instance = null;

    static public function getInstance() {
        if (!self::$instance) {
            self::connect();
        }
        return self::$instance;
    }

    static private function connect() {
        try {
            $dsn = self::$driver
                    . ':host=' . self::$host
                    . ';dbname=' . self::$dbname;
            self::$instance = new PDO($dsn, self::$user);
            return true;
        } catch (PDOException $e) {
            echo $e->getmessage();
        }
    }

}

?>
