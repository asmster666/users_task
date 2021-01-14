<?php 
    function OpenConnection()
    {
        $connect = new mysqli("localhost", "user_account", "", "user_task") or die("Connection failed!");
        echo "connected successfully";

        return $connect;
    }
?>