<?php

//require("db_connection.php");

try {
    
    $db = new db();
    $id = $_GET['id'];
    $db->update("employees", "firstName='{$_POST['firstName']}', lastName='{$_POST['lastName']}', address='{$_POST['address']}', gendre='{$_POST['gender']}', pass='{$_POST['password']}', username='{$_POST['username']}', country='{$_POST['country']}'", "id=$id");


    header("Location: list.php");
    exit();
}catch(PDOException $exc){

    echo $exc->getMessage();

}


?>