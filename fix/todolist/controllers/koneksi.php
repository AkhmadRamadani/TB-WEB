<?php 
    $host = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'todolist';

    
	$connection = mysqli_connect($host,$uname,$pass,$db);

    if (!$connection) {
        ?>
            <body style="background-color: #f2f2f2">
                <h1 align="center">Koneksi gagal</h1>
                <p align="center"> <?php  echo mysqli_connect_error(); ?></p>
            </body>
        <?php
    }
?>