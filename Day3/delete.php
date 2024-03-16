<?php

//require("db_connection.php");

try{
    
    $connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

    $connection->query("delete from employees where id=$id");

    header("Location:list.php");


}catch(PDOException $exc){

    echo $exc->getMessage();

}



?>