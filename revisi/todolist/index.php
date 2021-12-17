<?php
// error_reporting(0);
session_start();
$page = $_GET['page'];
$statusLogin = $_SESSION['status'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>TO DO LIST</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="main.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
	<script defer src="script.js"></script>
</head>

<body style="min-height: 100%;">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg" style="background-color:white; box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.25);">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">
				<img src="to-do-list.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
			</a>
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="?page=home" style="color:black"><b>HOME</b></a>
				</li>
				<?php

				if ($statusLogin == 'login') {
				?>
					<li class="nav-item">
						<a class="nav-link" href="?page=todolist" style="color:black">To-Do List</a>
					</li>

				<?php
				}
				?>
			</ul>
			<?php

			if ($statusLogin == 'login') {
			?>
				<div class="d-flex align-items-center">
					<a href="controllers/logout_controller.php">
						<button type="button" class="btn btn-primary me-3">
							Logout
						</button>
					</a>

				</div>

			<?php
			} else {
			?>
				<div class="d-flex align-items-center">
					<a href="login.php">
						<button type="button" class="btn btn-outline-light text-dark me-2">
							Login
						</button>
					</a>
					<a href="register.php">
						<button type="button" class="btn btn-primary me-3">
							Sign Up
						</button>
					</a>
				</div>

			<?php
			}
			?>

		</div>
	</nav>

	<!-- header -->
	<div style="min-height: 100%;">
		<?php
		switch ($page) {
			case 'todolist':
				include 'lists.php';
				break;
			case 'home':
				include 'home.php';
				break;

			case 'tasks':
				include 'task_list.php';
				break;

			default:
				include 'home.php';
				break;
		}
		?>
	</div>
	<!-- footer -->
	<footer class="text-center text-white p-5" style="background-color: black;">
		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: black;">
			© 2021 Copyright:
			<a class="text-white" href="index.html">TO DO LIST</a>
		</div>
	</footer>
</body>

</html>