<?php
    include 'koneksi.php';

    $name = $_POST['name'];
    $list_id = $_POST['list_id'];
    $list_name = $_POST['list_name'];
    $date_now = date('Y-m-d');
    $due_date = $_POST['due_date'];
    
    if ($due_date != '') {
        $due_date = $_POST['due_date'];
        # code...

        $sql = "
        INSERT INTO tasks(task_name, task_status, list_id, date_added, due_date)
        VALUES ('$name', 0,'$list_id', '$date_now', '$due_date')
        ";
    }else{
        $due_date = 'NULL';
    
        $sql = "
        INSERT INTO tasks(task_name, task_status, list_id, date_added, due_date)
        VALUES ('$name', 0,'$list_id', '$date_now', NULL)
        ";
    }

    echo $sql;

    if (isset($name)) {

        if (mysqli_query($connection, $sql)) {
            header("location:../index.php?page=tasks&list_id=$list_id");
        } else {
            // echo isset($jeniskelamin);
            // echo $sql;
            echo mysqli_error($connection);
        }
    } else {
        header("location:../index.php?page=tasks&list_id=$list_id");

    }
