<?php

    class  Connect
    {
        public static $connection;

        public static function createConnection(){
            $server_name = "localhost";
            $username = "root";
            $password = "";
            $database = "indogamermall";

            self::$connection = new mysqli($server_name, $username, $password, $database);

            if (self::$connection->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            return self::$connection;
        }
    }


?>