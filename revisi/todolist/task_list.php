<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="styles/todolist.css">
    <script src="js/todolist.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootlint/1.1.0/bootlint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <style>
        [type="checkbox"] {
            opacity: 0;
            position: absolute;
        }

        .task label {
            display: flex-inline;
            align-items: center;
            position: relative;
        }

        .task {
            position: relative;
            margin-bottom: 1.25em;
        }

        .task::after {
            content: "";
            position: absolute;
            right: 0;
            left: 0;
            bottom: -0.5em;
            height: 1px;
            background: currentColor;
            opacity: 0.1;
        }

        .custom-checkbox {
            --size: 0.75em;
            display: inline-block;
            width: var(--size);
            height: var(--size);
            margin-right: var(--size);
            cursor: pointer;
            border: 2px solid currentColor;
            border-radius: 50%;
            -webkit-transform: scale(1);
            transform: scale(1);
            transition: -webkit-transform 300ms ease-in-out;
            transition: transform 300ms ease-in-out;
            transition: transform 300ms ease-in-out, -webkit-transform 300ms ease-in-out;
        }

        .task:hover .custom-checkbox,
        [type="checkbox"]:focus+label .custom-checkbox {
            -webkit-transform: scale(1.2);
            transform: scale(1.2);
            color: var(--clr-primary);
        }

        [type="checkbox"]:checked+label .custom-checkbox {
            background: var(--clr-primary);
            border-color: var(--clr-primary);
            box-shadow: inset 0 0 0px 2px white;
        }

        [type="checkbox"]:checked+label {
            opacity: 0.5;
        }

        .task label::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            left: 1.5em;
            top: 50%;
            height: 3px;
            background: currentColor;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: right;
            transform-origin: right;
            transition: -webkit-transform 150ms ease-in-out;
            transition: transform 150ms ease-in-out;
            transition: transform 150ms ease-in-out, -webkit-transform 150ms ease-in-out;
        }

        [type="checkbox"]:checked+label::after {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            -webkit-transform-origin: left;
            transform-origin: left;
        }
    </style>
</head>
<?php
include './controllers/koneksi.php';
$list_id = $_GET['list_id'];

$query = "SELECT * FROM lists WHERE list_id = '$list_id'";


$result = mysqli_query($connection, $query);
$row   = mysqli_fetch_assoc($result);
?>

    <body>
        <div class="modal fade" id="updateList" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <form action="controllers/update_list.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update List</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name of List</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name of List" name="name" value="<?php echo $row['list_name'] ?>">
                            </div>

                        </div>
                        <input type="text" name="list_id" value="<?php echo $row['list_id']; ?>" hidden>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
            <!-- App title section -->
            <div class="row m-1 p-4">
                <div class="col">
                    <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">

                        <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                        <u><?php echo $row['list_name'] ?? "My Tasks" ?></u>
                        <i data-toggle="modal" data-target="#updateList" class="fa fa-gear text-black rounded p-0"></i>

                    </div>
                    <form action="controllers/delete_list.php" method="post" onsubmit="return confirm('Are you sure you want to delete this list?');">
                        <input type="text" value="<?php echo $row['list_id'] ?>" name="list_id" hidden>
                        <button type="submit" class="btn btn-danger align-self-end">Delete List</button>

                    </form>

                </div>
            </div>
            <!-- Create todo section -->
            <div class="row m-1 p-3">
                <div class="col col-11 mx-auto">
                    <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                        <form action="controllers/add_new_task.php" method="post">

                            <div class="col">
                                <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" name="name" type="text" placeholder="Add new .." required>
                            </div>
                            <div class="col-auto m-0 px-2 d-flex align-items-center">
                                <label class="text-secondary my-2 p-0 px-1 view-opt-label due-date-label" id="dueDateLabel">Due date : </label>
                                <input type="date" id="dueDateData" name="due_date">

                                <!-- <i class="fa fa-calendar my-2 px-1 text-primary btn due-date-button" data-toggle="tooltip" data-placement="bottom" title="Set a Due date"></i>
                            <i class="fa fa-calendar-times-o my-2 px-1 text-danger btn clear-due-date-button" data-toggle="tooltip" data-placement="bottom" title="Clear Due date" 
                              ></i> -->
                            </div>
                            <input type="text" name="list_id" value="<?php echo $list_id ?>" hidden>
                            <div class="col-auto px-0 mx-0 mr-2">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-2 mx-4 border-black-25 border-bottom"></div>
            <!-- View options section -->
            <!-- <div class="row m-1 p-3 px-5 justify-content-end">
                <div class="col-auto d-flex align-items-center">
                    <label class="text-secondary my-2 pr-2 view-opt-label">Filter</label>
                    <select class="custom-select custom-select-sm btn my-2">
                        <option value="all" selected>All</option>
                        <option value="completed">Completed</option>
                        <option value="active">Active</option>
                        <option value="has-due-date">Has due date</option>
                    </select>
                </div>
                <div class="col-auto d-flex align-items-center px-1 pr-3">
                    <label class="text-secondary my-2 pr-2 view-opt-label">Sort</label>
                    <select class="custom-select custom-select-sm btn my-2">
                        <option value="added-date-asc" selected>Added date</option>
                        <option value="due-date-desc">Due date</option>
                    </select>
                    <i class="fa fa fa-sort-amount-asc text-info btn mx-0 px-0 pl-1" data-toggle="tooltip" data-placement="bottom" title="Ascending"></i>
                    <i class="fa fa fa-sort-amount-desc text-info btn mx-0 px-0 pl-1 d-none" data-toggle="tooltip" data-placement="bottom" title="Descending"></i>
                </div>
            </div> -->
            <!-- Todo list section -->
            <div class="row mx-1 px-5 pb-3 w-80">
                <div class="col mx-auto">

                    <?php

                    $queryGetTask = "SELECT * FROM tasks t INNER JOIN lists l ON t.list_id = l.list_id  WHERE l.list_id = '$list_id'";
                    $resultTask = mysqli_query($connection, $queryGetTask);
                    // echo $queryGetTask;
                    if (mysqli_num_rows($resultTask) > 0) {
                        while ($rowTask = mysqli_fetch_assoc($resultTask)) {
                    ?>

                            <div class="modal fade" id="staticBackdrop<?php echo $rowTask['task_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                                <div class="modal-dialog" role="document">
                                    <form action="controllers/update_task.php" method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>


                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name of Task</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name of Task" name="name" value="<?php echo $rowTask['task_name'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Due Date</label>
                                                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Due Date" name="due_date" value="<?php echo $rowTask['due_date'] ?>">
                                                </div>
                                            </div>
                                            <input type="text" name="list_id" value="<?php echo $rowTask['list_id']; ?>" hidden>
                                            <input type="text" name="task_id" value="<?php echo $rowTask['task_id']; ?>" hidden>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="row px-3 align-items-center todo-item rounded">
                                <div class="col-auto m-1 p-0 d-flex align-items-center">
                                    <div class="task">
                                        <form action="controllers/update_status_task.php" method="post" id="<?php echo 'formUpdate' . $rowTask['task_id']; ?>">
                                            <input <?php echo $rowTask['task_status'] == 1 ? 'checked' : '' ?> type="checkbox" id="<?php echo $rowTask['task_id']; ?>" name="status" class="auto_submit_item" onchange="document.getElementById('<?php echo 'formUpdate' . $rowTask['task_id']; ?>').submit()">
                                            <label for="<?php echo $rowTask['task_id']; ?>" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3">

                                                <span class="custom-checkbox"></span>
                                                <?php echo $rowTask['task_name']; ?>
                                            </label>
                                            <input type="text" value="<?php echo $rowTask['list_name']; ?>" name="list_name" hidden>
                                            <input type="text" value="<?php echo $rowTask['list_id']; ?>" name="list_id" hidden>
                                            <input type="text" value="<?php echo $rowTask['task_id']; ?>" name="task_id" hidden>
                                        </form>
                                    </div>

                                </div>
                                <div class="col px-1 m-1 d-flex align-items-center">
                                    <!-- <input type="text" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly value="<?php echo $rowTask['task_name'] ?>" title="<?php echo $rowTask['task_name'] ?>" /> -->
                                    <!-- <input type="text" class="form-control form-control-lg border-0 edit-todo-input rounded px-3" value="<?php //echo $rowTask['task_name'] 
                                                                                                                                                ?>" readonly/> -->
                                </div>
                                <?php
                                if ($rowTask['due_date'] != null) {
                                ?>

                                    <div class="col-auto m-1 p-0 px-3">
                                        <div class="row">
                                            <div class="col-auto d-flex align-items-center rounded bg-white border border-warning">
                                                <i class="fa fa-hourglass-2 my-2 px-2 text-warning btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Due on date"></i>
                                                <h6 class="text my-2 pr-2"><?php echo date("F d Y", strtotime($rowTask['due_date'])) ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="col-auto m-1 p-0 todo-actions">

                                    <div class="row todo-created-info">
                                        <div class="col-auto d-flex align-items-center justify-content-end pr-2">

                                            <h5 class="m-0 p-0 px-2" data-toggle="modal" data-target="#staticBackdrop<?php echo $rowTask['task_id'] ?>">
                                                <i class="fa fa-pencil text-info btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Edit todo"></i>
                                            </h5>
                                            <form action="controllers/delete_task.php" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">

                                                <button type="submit">
                                                    <h5 class="m-0 p-0 px-2">
                                                        <i class="fa fa-trash-o text-danger btn m-0 p-0" data-toggle="tooltip" data-placement="bottom" title="Delete todo"></i>
                                                    </h5>
                                                </button>

                                                <input type="text" name="id_task" value="<?php echo $rowTask['task_id'] ?>" hidden>
                                                <input type="text" name="id_list" value="<?php echo $rowTask['list_id'] ?>" hidden>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="row todo-created-info">
                                        <div class="col-auto d-flex align-items-center pr-2">
                                            <i class="fa fa-info-circle my-2 px-2 text-black-50 btn" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Created date"></i>
                                            <label class="date-label my-2 text-black-50"><?php echo $rowTask['date_added']; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </body>


</html>