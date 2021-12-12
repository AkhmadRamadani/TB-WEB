<?php 
	include 'koneksi.php';

	$password = md5($_POST['password']);
	$email = $_POST['email'];
    $remember_me = $_POST['remember_me'];

    $sql = "
		SELECT * FROM user WHERE
        password = '$password' AND 
        email = '$email'
	";
    $result = mysqli_query($connection, $sql);
    $cek = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
	if ( isset($password) && isset($email)) {
	
		if ($cek ) {
            session_start();
            $_SESSION['status'] = 'login';
            $_SESSION['id'] = $row['user_id'];
			if ($remember_me) {
				setcookie("rememberred",true);
				setcookie("email", $email);
			}
			header("location:../index.php");   
		}else{
			// echo isset($jeniskelamin);
			// echo $sql;
			echo mysqli_error($connection);
		    header("location:../login.php?err=data_salah");   

		}
	}else{
		header("location:../login.php?err=data_tidak_lengkap");   

	}
?>