<?php
	session_start();
	$id = $_POST['id_mahasiswa'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_mahasiswa Where id_mahasiswa = $id") or die (mysqli_error($connect));
	if ($delete) {
		$_SESSION['berhasil'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Menghapus";
		echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
	}
?>