<?php
	session_start();
	$id = $_POST['id_dosen'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_dosen Where id_dosen = $id") or die (mysqli_error($connect));
	if ($delete) {
		$_SESSION['berhasil'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_dosen';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Menghapus";
		echo "<script>location.href='../../index.php?page=data_dosen';</script>";
	}
?>