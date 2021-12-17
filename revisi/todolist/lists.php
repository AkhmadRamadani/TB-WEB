<?php
session_start();

include 'controllers/koneksi.php';
$id_user = $_SESSION['id'];
$query = "SELECT l.*, COUNT(t.task_id) as jumlahTask FROM lists l LEFT JOIN tasks t ON t.list_id = l.list_id WHERE user_id = '$id_user' GROUP BY l.list_id";

?>
<div class="header">
    <h1 class="p-5 text-white text-center" style="background-color:#03015D; text-align:center;">
        Stuff I need to do</h1>
</div>
<div class="container p-3 mv-3">
    <form class="form-inline justify-content-end" action="controllers/insert_list_controller.php" method="POST">
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputList" class="sr-only">List Name</label>
            <input type="text" class="form-control" id="inputList" placeholder="List Name" name="name">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Add List</button>
    </form>
    <ul class="list-group">
        <?php


        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>
                <a href="?page=tasks&list_id=<?php echo $row['list_id']; ?>" style="margin-top: 10px;">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $row['list_name'] ?>
                        <span class="badge badge-primary badge-pill"><?php echo $row['jumlahTask'] ?></span>

                    </li>
                </a>
        <?php
            }
        }
        ?>
    </ul>
</div>