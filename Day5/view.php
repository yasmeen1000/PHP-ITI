<ul>
<?php

//require("db_connection.php");

try {
    $db = new db();
    $id = $_GET['id'];
    $result = $db->get_data("employees", "id=$id");
    $emp = $result->fetch(PDO::FETCH_ASSOC);
    echo "<ul>";
    foreach($emp as $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
}catch(PDOException $exc){

    echo $exc->getMessage();

}

?>

</ul>