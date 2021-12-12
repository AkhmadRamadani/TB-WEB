<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "
		INSERT INTO user(name, email, password)
		VALUES ('$nama', '$email', '$password')
	";

if (isset($nama) && isset($email)  && isset($password)) {

	if (mysqli_query($connection, $sql)) {

		header("location:../login.php");
	} else {
		// echo isset($jeniskelamin);
		// echo $sql;
		echo mysqli_error($connection);
	}
} else {
	header("location:../register.php?err=data_tidak_lengkap");
}
