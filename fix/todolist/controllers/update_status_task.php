<?php

    include 'koneksi.php';

    $task_id = $_POST['task_id'];
    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $status = $_POST['status'];

    $statusChanging = 0;
    if ($status == 'on') {
        $statusChanging = 1;
    }else{
        $statusChanging = 0;
    }
    $sql = "
        UPDATE tasks SET task_status = '$statusChanging' WHERE task_id = '$task_id'
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
