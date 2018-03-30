<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConfig
 *
 * @author pongpon
 */
class DBConfig {

    public static $hostname;
    public static $database;
    public static $username;
    public static $password;
    public static $port;

    public static function connectDatabase() {

        DBConfig::$hostname = "localhost";
        DBConfig::$database = "RTe-wallet";
        DBConfig::$username = "root";
        DBConfig::$password = "rt2018";

        $conn = new mysqli(DBConfig::$hostname, DBConfig::$username, DBConfig::$password, DBConfig::$database);
        $cs = "SET character_set_results=utf8";

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            return false;
        } else {
            $q = $conn->query($cs);
            return $conn;
        }
    }

}
