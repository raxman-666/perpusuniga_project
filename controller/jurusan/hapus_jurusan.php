<?php
	session_start();
	$id = $_POST['id_jurusan'];

	include "../connection.php";
	$delete = mysqli_query($connect,"DELETE FROM t_jurusan Where id_jurusan = $id") or die (mysqli_error($connect));
	if ($delete) {
		$_SESSION['berhasil'] = "Berhasil Menghapus";
		echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Menghapus";
		echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
	}
?>