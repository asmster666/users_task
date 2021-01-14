<?php 
    include 'connect.php';

    $connect = OpenConnection();

    $value = $_GET['hash'];

    $delete = $connect->query("DELETE FROM profiles WHERE user_id = '$value';") or die ("error while deleting...");

    if($delete) {
        $connect->close();
        exit;
    } else {
        echo "Item wasn't deleted";
    }
?>