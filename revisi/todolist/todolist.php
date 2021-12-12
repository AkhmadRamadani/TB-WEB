<script>
    $(function() {
        $(".auto_submit_item").change(function() {
            $("formupdatestatus").submit();
        });
    });
</script>
<div class="header">
    <h1 class="p-5 text-white text-center" style="background-color:#03015D; text-align:center;">
        Stuff I need to do</h1>
</div>

<div class="content">
    <div class="all-tasks">
        <h2 class="task-list-title">My lists</h2>
        <?php
		error_reporting(0);
        include 'controllers/koneksi.php';
        $id_user = $_SESSION['id'];
        $query = "SELECT * FROM lists WHERE user_id = '$id_user'";


        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <a href="?page=todolist&list_id=<?php echo $row['list_id']; ?>&list_name=<?php echo $row['list_name']; ?>" style="text-decoration: none; color: black;">
                    <ul class="task-list"><?php echo $row["list_name"] ?></ul>
                </a>
        <?php
            }
        }
        ?>
        <!-- <ul class="task-list" data-lists></ul> -->
        <form action="controllers/insert_list_controller.php" method="post">
            <input type="text" class="new list" placeholder="new list name" aria-label="new list name" name="name" />
            <button type="submit" class="btn create" aria-label="create new list">+</button>
        </form>
    </div>
    <?php
    $list_id = $_GET['list_id'];
    $list_name = $_GET['list_name'];
    $queryGetTask = "SELECT * FROM tasks t INNER JOIN lists l ON t.list_id = l.list_id  WHERE l.list_id = '$list_id'";
    $resultTask = mysqli_query($connection, $queryGetTask);
    $completedTaskId = [];
    ?>

    <?php
    if (isset($list_id)) {
    ?>

        <div class="todo-list">
            <div class="todo-header">
                <h2 class="list-title"><?php echo $list_name; ?></h2>
                <p class="task-count"><?php echo mysqli_num_rows($resultTask); ?> tasks remaining</p>
            </div>
            <div class="todo-body">

                <div class="tasks">
                    <?php
                    // echo mysqli_num_rows($resultTask);
                    if (mysqli_num_rows($resultTask) > 0) {
                        while ($rowTask = mysqli_fetch_assoc($resultTask)) {
                            if ($rowTask['task_status'] == 1) {
                                array_push($completedTaskId, $rowTask['task_id']);
                            }
                    ?>
                            <div class="task">
                                <form action="controllers/update_status_task.php" method="post" id="<?php echo 'formUpdate' . $rowTask['task_id']; ?>">
                                    <input <?php echo $rowTask['task_status'] == 1 ? 'checked' : '' ?> type="checkbox" id="<?php echo $rowTask['task_id']; ?>" name="status" class="auto_submit_item" onchange="document.getElementById('<?php echo 'formUpdate' . $rowTask['task_id']; ?>').submit()">
                                    <label for="<?php echo $rowTask['task_id']; ?>">

                                        <span class="custom-checkbox"></span>
                                        <?php echo $rowTask['task_name']; ?>
                                    </label>
                                    <input type="text" value="<?php echo $rowTask['list_name']; ?>" name="list_name" hidden>
                                    <input type="text" value="<?php echo $rowTask['list_id']; ?>" name="list_id" hidden>
                                    <input type="text" value="<?php echo $rowTask['task_id']; ?>" name="task_id" hidden>

                                </form>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="new-task-creator">
                    <form action="controllers/add_new_task.php" method="post">
                        <input type="text" name='list_id' value="<?php echo $list_id; ?>" hidden>
                        <input type="text" name='list_name' value="<?php echo $list_name; ?>" hidden>
                        <input type="text" data-new-task-input class="new task" placeholder="new task name" aria-label="new task name" name='name' />
                        <button type="submit" class="btn create" aria-label="create new task">+</button>
                    </form>
                </div>

                <div class="delete-stuff">
                    <form action="controllers/clear_completed_tasks.php" method="post">
                        <?php
                        foreach ($completedTaskId as $id) {
                        ?>
                            <input type="text" name="id_completed_task[]" value="<?php echo $id; ?>" hidden>

                        <?php
                        }
                        ?>

                        <input type="text" value="<?php echo $list_name; ?>" name="list_name" hidden>
                        <input type="text" value="<?php echo $list_id; ?>" name="list_id" hidden>
                        <button type="submit" class="btn delete">Clear completed tasks</button>

                    </form>
                    <form action="controllers/delete_list.php" method="post">
                        <input type="text" value="<?php echo $list_id; ?>" name="list_id" hidden>

                        <button type="submit" class="btn delete" data-delete-list-button>Delete list</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<template id="task-template">
    <div class="task">
        <input type="checkbox" />
        <label>
            <span class="custom-checkbox"></span>
        </label>
    </div>
</template>