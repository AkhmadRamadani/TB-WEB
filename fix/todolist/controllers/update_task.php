<?php

    include 'koneksi.php';

    $task_id = $_POST['task_id'];
    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $status = $_POST['status'];
    $name = $_POST['name'];
    $date_now = date('Y-m-d');
    $due_date = $_POST['due_date'];

    $sql = "
        UPDATE tasks SET task_name = '$name', due_date = '$due_date' WHERE task_id = '$task_id'
    ";

    if (isset($task_id)) {

        if (mysqli_query($connection, $sql)) {
            // echo $sql;
            header("location:../index.php?page=tasks&list_id=$list_id");
        } else {
            // echo isset($jeniskelamin);
            // echo $sql;
            echo mysqli_error($connection);
        }
    } else {
        header("location:../index.php?page=tasks&list_id=$list_id");
    }
