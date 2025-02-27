<?php

class Database {

    public static $connection;

    // Setup the database connection
    public static function setUpConnection() {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost","root","password ","Coming-Soon_db", "3306" ); //Add your MySQL database name and password

            // Check for connection errors
            if (Database::$connection->connect_error) {
                die("Connection failed: " . Database::$connection->connect_error);
            }
        }
    }

    // Function to escape strings to prevent SQL injection
    public static function escape_string($string) {
        Database::setUpConnection();
        return Database::$connection->real_escape_string($string);
    }

    // Function to execute Insert/Update/Delete (IUD) queries
    public static function iud($q) {
        Database::setUpConnection();
        if (!Database::$connection->query($q)) {
            die("Error executing query: " . Database::$connection->error);
        }
    }

    // Function to execute a Select query and return the result set
    public static function search($q) {
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        if ($resultset === false) {
            die("Error executing query: " . Database::$connection->error);
        }
        return $resultset;
    }
}

?>
