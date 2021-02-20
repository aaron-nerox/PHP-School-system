<?php
    class DbConnection{

        public function db_connect($host,$dbname,$user,$password){
            $dsn = "mysql:host=$host; dbname=$dbname";
            $db_connection = new PDO($dsn, $user, $password);
            $db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $db_connection;
        }
    }