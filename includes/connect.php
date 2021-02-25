<?php 
    function OpenConnection()
    {
        $connect = new mysqli("localhost", "", "", "user_task") or die("Connection failed!");

        return $connect;
    }
?>
