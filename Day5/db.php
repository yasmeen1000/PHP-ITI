<?php
class db{
private $host="localhost";
private $dbname="php_test";
private $user="root";
private $pass="";
private $connection="";
function __construct(){
    $this ->connection=new pdo("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
}
function get_connection(){
    return $this->connection;
}
function get_data($table,$cond=1){
    return $this->connection->query("select * from $table where $cond");
}
function delete_data($table,$cond){
    return $this->connection->query("delete from $table where $cond");
}
function insert($table,$cols,$values){
    return $this->connection->query("insert into $table($cols) values ($values)");
}
function update($table, $set_values, $cond) {
    return $this->connection->query("update $table set $set_values where $cond");
}


}
?>