<?php
    session_start();

    include 'koneksi.php';

    $name = $_POST['name'];
    $id_user = $_SESSION['id'];
    $sql = "
    INSERT INTO lists(list_name, user_id)
    VALUES ('$name', '$id_user')
    ";
    echo $sql;

    if (isset($name)) {

        if (mysqli_query($connection, $sql)) {
            header('location:../index.php?page=todolist');
        } else {
            // echo isset($jeniskelamin);
            // echo $sql;
            echo mysqli_error($connection);
        }
    } else {

    }
    
?>