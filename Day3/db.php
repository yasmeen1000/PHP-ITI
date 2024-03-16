<?php

//1-Connection
// $connection = new mysqli("localhost","root","","php_test");

// if($connection->connect_errno)
// {
//     die("Connection failed");
// }

try{
    $connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    //2-Query
$connection->query("insert into employees(firstName,lastName,address,gendre,pass,username,country)
values('{$_POST['firstName']}','{$_POST['lastName']}','{$_POST['address']}', '{$_POST['gender']}',
'{$_POST['password']}', '{$_POST['username']}', '{$_POST['country']}')");

}catch(PDOException $exc){

    echo $exc->getMessage();

}




//3-Close

$connection=null;
//$connection->close();

header("Location:list.php");

?>