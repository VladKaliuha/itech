<?php
    $db_driver="mysql"; $host = "localhost"; $database = "football";
    $dsn = "$db_driver:host=$host; dbname=$database";
    $username = "root"; $password = "";
    $options = array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        $dbh = new PDO ($dsn, $username, $password, $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>"; die();
    }
?>