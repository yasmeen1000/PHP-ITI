<ul>
<?php

//require("db_connection.php");

try{


    $connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

$result = $connection->query("select * from employees where id=$id");

//$emp = $result->fetch_assoc();
$emp = $result->fetch(PDO::FETCH_ASSOC);

foreach($emp as $value)
    {
        echo "<li>$value</li>";
    }

}catch(PDOException $exc){

    echo $exc->getMessage();

}

?>

</ul>