<?php

//1-Connection
$connection = new mysqli("localhost","root","","php_test");

if($connection->connect_errno)
{
    die("Connection failed");
}




?>