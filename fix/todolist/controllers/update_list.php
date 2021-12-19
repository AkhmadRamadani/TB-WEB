<?php
    session_start();

    include 'koneksi.php';

    $name = $_POST['name'];
    $list_id = $_POST['list_id'];
    $sql = "
    UPDATE lists SET list_name = '$name' WHERE list_id = '$list_id'
    ";

    if (isset($name)) {

        if (mysqli_query($connection, $sql)) {
            header("location:../index.php?page=tasks&list_id=$list_id");
        } else {
            // echo isset($jeniskelamin);
            // echo $sql;
            echo mysqli_error($connection);
        }
    } else {

    }
    
?>