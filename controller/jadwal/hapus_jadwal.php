<?php
	session_start();
	$id = $_POST['id_jadwal'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_jadwalkuliah Where id_jadwal = $id") or die (mysqli_error($connect));
	if ($delete) {
		$_SESSION['berhasil'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Menghapus";
		echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
	}
?>