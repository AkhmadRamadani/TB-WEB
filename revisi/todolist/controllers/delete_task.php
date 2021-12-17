<?php
include 'koneksi.php';

$list_id = $_POST['id_list'];
$task_id = $_POST['id_task'];
$sql = "DELETE FROM tasks WHERE task_id = '$task_id'";
if (mysqli_query($connection, $sql)) {
    header("location:../index.php?page=tasks&list_id=$list_id");
} else {
    echo mysqli_error($connection);
}