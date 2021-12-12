<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TO DO LIST</title>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto"
      rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="main.css"/>
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
			<a class="navbar-brand" href="index.html">
			  <img src="to-do-list.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
			</a>
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				  <a class="nav-link" href="index.html" style="color:black;"><b>TO DO LIST</b></a>
				</li>
			</ul>
			<div class="d-flex align-items-center">
				<button type="button" class="btn btn-primary me-3">
					Logout
				</button>
			</div>
		</div>
	</nav>
	
	<!-- header -->
	<div class="header">
		<h1 class="p-5 text-white text-center" style="background-color:#03015D; text-align:center;">
		Stuff I need to do</h1>
	</div>
	
	<div class="content">
		<!-- example
		<div class="all-tasks">
			<h2 class="task-list-title">My lists</h2>
			<ul class="task-list" data-lists>
				<li class="list-name active-list">List 1</li>
				<li class="list-name">List 2</li>
				<li class="list-name">List 3</li>
			</ul>
			<form action="">
			<input 
			  type="text"
			  class="new list"
			  placeholder="new list name"
			  aria-label="new list name"
			/>
			<button class="btn create" aria-label="create new list">+</button>
			</form>
		</div>
		
		<div class="todo-list">
			<div class="todo-header">
				<h2 class="list-title">List 1</h2>
				<p class="task-count">3 tasks remaining</p>
			</div>
			<div class="todo-body">
				<div class="tasks">
					<div class="task">
						<input type="checkbox" id="task-1"/>
						<label for="task-1">
							<span class="custom-checkbox"></span>
							Task 1
						</label>
					</div>
					
					<div class="task">
						<input type="checkbox" id="task-2"/>
						<label for="task-2">
							<span class="custom-checkbox"></span>
							Task 2
						</label>
					</div>
					
					<div class="task">
						<input type="checkbox" id="task-3"/>
						<label for="task-3">
							<span class="custom-checkbox"></span>
							Task 3
						</label>
					</div>
				  
				</div>

				<div class="new-task-creator">
					<form action="">
						<input 
						  type="text"
						  class="new task"
						  placeholder="new task name"
						  aria-label="new task name"
						/>
						<button class="btn create" aria-label="create new task">+</button>
					</form>
				</div>
			
				<div class="delete-stuff">
					<button class="btn delete">Clear completed tasks</button>
					<button class="btn delete">Delete list</button>
				</div>
			</div>
		</div>
		-->
		<div class="all-tasks">
			<h2 class="task-list-title">My lists</h2>
			<ul class="task-list" data-lists></ul>
			<form action="controllers/insert_list_controller.php" method="post">
				<input 
				  type="text"
				  class="new list"
				  placeholder="new list name"
				  aria-label="new list name"
                  name="name"
				/>
				<button type="submit" class="btn create" aria-label="create new list">+</button>
			</form>
		</div>

		<div class="todo-list" data-list-display-container>
			<div class="todo-header">
				<h2 class="list-title" data-list-title>YouTube</h2>
				<p class="task-count" data-list-count>3 tasks remaining</p>
			</div>

			<div class="todo-body">
				<div class="tasks" data-tasks></div>

				<div class="new-task-creator">
					<form action="" data-new-task-form>
						<input 
						  type="text"
						  data-new-task-input
						  class="new task"
						  placeholder="new task name"
						  aria-label="new task name"
						/>
						<button class="btn create" aria-label="create new task">+</button>
					</form>
				</div>

				<div class="delete-stuff">
					<button class="btn delete" data-clear-complete-tasks-button>Clear completed tasks</button>
					<button class="btn delete" data-delete-list-button>Delete list</button>
				</div>
			</div>
		</div>
    </div>
	<template id="task-template">
		<div class="task">
			<input type="checkbox" />
			<label>
			<span class="custom-checkbox"></span>
			</label>
		 </div>
	</template>
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