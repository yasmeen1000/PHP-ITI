<?php


require("db.php");

try {
    
    $db = new db();

    
    $id = $_GET['id'];

   
    $db->delete_data('employees', "id=$id");


    header("Location: list.php");
} catch(PDOException $exc) {
  
    echo $exc->getMessage();
}
?>