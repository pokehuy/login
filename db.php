<?php

$servername = "localhost";
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// create database and execute it if not exists
    $sql = "CREATE DATABASE IF NOT EXISTS abc12;";
    $conn->exec($sql);
// use database
    $sql = "USE abc12;";
    $conn->exec($sql);
// create table and execute it if not exists
    $sql = "CREATE TABLE IF NOT EXISTS abc12users (USERNAME VARCHAR(100) UNIQUE, PASSWORD_HASH CHAR(40), PHONE VARCHAR(10));";
    $conn->exec($sql);
} catch (PDOException $e){
    echo "Error " . $e->getMessage();
}
//stop the connect to the database
$conn = null;

//create a connect with extra information database name without stop connect to use for other file
$dbname = "abc12";
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error " . $e->getMessage();
}


