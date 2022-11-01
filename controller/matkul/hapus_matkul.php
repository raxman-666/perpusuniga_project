<?php
	session_start();
	$id = $_POST['id_matkul'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_matakuliah Where id_matkul = $id") or die (mysqli_error($connect));
	if ($delete) {
		$_SESSION['berhasil'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
	}else{
		$_SESSION['gagal'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
	}
?>