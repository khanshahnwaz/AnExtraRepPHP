

<?php

function createCon(){
    $host="localhost";
    $user="root";
$password="khanbhai";
// 

$connection=mysqli_CONNECT($host,$user,$password) or die("Failed to connect to database.");
// echo "MySQL connected successfully!";

// now create the database
$query="CREATE DATABASE IF NOT EXISTS anExtraRep";
$result= mysqli_query($connection,$query);
// if ($result)
// echo "Database created succesfully";
// else echo "Failed to create database ".mysqli_error($connection);

$db="anExtraRep";
$connection =mysqli_CONNECT($host,$user,$password,$db) ;
// if ($result)
// echo "Database connected succesfully";
// else echo "Failed to create database ".mysqli_error($connection);
// create table

$query= "CREATE TABLE IF NOT EXISTS anExtraRep (
    NAME varchar(20),
    Age INT,
    EMAIL VARCHAR(50) PRIMARY KEY,
    WEIGHT INT ,
    HEALTHREPORT VARBINARY(65000))";

$result=mysqli_query($connection,$query);
// if ($result)
// echo "Table created succesfully";
// else echo "Failed to create table. ";
return $connection;
}
?>