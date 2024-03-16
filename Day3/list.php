<a href="form.html">Add</a>

<table  border=2>

<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Password</th>
    <th>Username</th>
    <th>Country</th>


</tr>

<?php

//1-Connection
// $connection = new mysqli("localhost","root","","php_test");

// if($connection->connect_errno)
// {
//     die("Connection failed");
// }


try{


    $connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $result = $connection->query("select * from employees");

while($row = $result->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";

    foreach($row as $value)
    {
        echo "<td>$value</td>";
    }

    echo "<td>
    <a href='view.php?id={$row['id']}'>View</a>
    <a href='edit.php?id={$row['id']}'>Edit</a>
    <a href='delete.php?id={$row['id']}'>Delete</a>
    </td>";


    echo "</tr>";
}

}catch(PDOException $exc){

    echo $exc->getMessage();

}




//3-Close

 //$connection->close();

?>


</table>