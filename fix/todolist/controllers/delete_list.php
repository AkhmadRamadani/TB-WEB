<?php
include 'koneksi.php';

$list_id = $_POST['list_id'];
$sql = "DELETE FROM lists WHERE list_id = $list_id ";
$sqlDeleteTask = "DELETE FROM tasks WHERE list_id = $list_id";

if (mysqli_query($connection, $sqlDeleteTask)) {
    if (mysqli_query($connection, $sql)) {
        header("location:../index.php?page=todolist");
    } else {
        echo mysqli_error($connection);
    }
} else {
    // echo isset($jeniskelamin);
    // echo $sql;
    echo mysqli_error($connection);
}
