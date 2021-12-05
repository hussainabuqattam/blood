<?php
include "config.php";

    $dsn = 'mysql:host=' . HOST_NAME . ';dbname=' . DB_NAME ;
    $user = USER;
    $pass = PASSWORD;
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try {
        $connect = new PDO($dsn, $user, $pass, $option);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo 'Failed To Connect' . $e->getMessage();
    }