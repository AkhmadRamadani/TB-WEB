<?php
include 'koneksi.php';
$id_task = $_REQUEST["id_task"];
$query = "SELECT * FROM tasks WHERE list_id = '$id_task'";
$result = mysqli_query($connection, $query);
$hasil;
// if (mysqli_num_rows($result) > 0) {
//     $i = 0;
//     while ($row = mysqli_fetch_assoc($result)) {
//         $hasil[$i]['task_id'] = $row['task_id'];
//         $hasil[$i]['task_name'] = $row['task_name'];
//         $hasil[$i]['task_status'] = $row['task_status'];
//         $hasil[$i]['list_id'] = $row['list_id'];
//         $i++;
//     }
// }
while($row = mysqli_fetch_array($result)){
    $task_id = $row['task_id'];
    $task_name = $row['task_name'];
    $task_status = $row['task_status'];
    $list_id = $row['list_id'];

    $return_arr[] = array("task_id" => $task_id,
                    "task_name" => $task_name,
                    "task_status" => $task_status,
                    "list_id" => $list_id);
}

// Encoding array in JSON format
echo json_encode($return_arr);
?>