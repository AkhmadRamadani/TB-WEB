<?php
include 'koneksi.php';

$list_id = $_POST['list_id'];
$list_name = $_POST['list_name'];
$sql = "DELETE FROM tasks WHERE task_id in ";
$sql .= "('" . implode("','", array_values($_POST['id_completed_task'])) . "')";

if (mysqli_query($connection, $sql)) {
    header("location:../index.php?page=todolist&list_id=$list_id&list_name=$list_name");
} else {
    // echo isset($jeniskelamin);
    // echo $sql;
    echo mysqli_error($connection);
}
