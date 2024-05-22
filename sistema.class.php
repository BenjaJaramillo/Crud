<?php
class Sistema
{
    var $conn;
    var $count=0;
    function connect()
    {
        $servername = "localhost";
        $username = "admin";
        $password = "123";
        $dbname = "sakila_es";

        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
    function setCount($count){
        $this->count = $count;
    }
    function getCount(){
        return $this->count;
    }
}
?>