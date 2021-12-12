<?php
    include 'koneksi.php';

    $name = $_POST['name'];
    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $sql = "
    INSERT INTO tasks(task_name, task_status, list_id)
    VALUES ('$name', 0,'$list_id')
    ";

    if (isset($name)) {

        if (mysqli_query($connection, $sql)) {
            header("location:../index.php?page=todolist&list_id=$list_id&list_name=$list_name");
        } else {
            // echo isset($jeniskelamin);
            // echo $sql;
            echo mysqli_error($connection);
        }
    } else {
        header("location:../index.php?page=todolist&list_id=$list_id&list_name=$list_name");

    }
    
?>