<?php
session_start();
$page = $_GET['page'];
$statusLogin = $_SESSION['status'];

if ($statusLogin == 'login') {
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
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
		<script defer src="script.js"></script>
	</head>

	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg" style="background-color:white; box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.25);">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">
					<img src="to-do-list.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
				</a>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<!-- <li class="nav-item">
						<a class="nav-link" href="?page=home" style="color:black;"><b>TO DO LIST</b></a>
					</li> -->

					<li class="nav-item">
						<a class="nav-link" href="?page=home" style="color:black">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?page=todolist" style="color:black">To-Do List</a>
					</li>

				</ul>
				<div class="d-flex align-items-center">
					<a href="controllers/logout_controller.php">
						<button type="button" class="btn btn-primary me-3">

							Logout
						</button>
					</a>

				</div>
			</div>
		</nav>

		<!-- header -->
		<?php
		switch ($page) {
			case 'todolist':
				include 'todolist.php';
				break;
			case 'home':
				include 'home.php';
				break;

			default:
				include 'home.php';
				break;
		}
		?>
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
<?php
} else {
	header('location:login.php');
}
?>