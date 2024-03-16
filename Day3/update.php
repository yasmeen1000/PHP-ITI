<?php

//require("db_connection.php");

try{
    
    $connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

$connection->query("update employees set firstName='{$_POST['firstName']}', lastName='{$_POST['lastName']}',
address='{$_POST['address']}', gendre='{$_POST['gender']}',
pass='{$_POST['password']}', username='{$_POST['username']}',country='{$_POST['country']}' where id=$id");

//echo $id ;
header("Location:list.php");


}catch(PDOException $exc){

    echo $exc->getMessage();

}


?>