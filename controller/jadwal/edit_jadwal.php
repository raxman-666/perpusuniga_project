<?php
	session_start();
	include "../connection.php";

	$id = $_POST['id_jadwal'];
	$hari = $_POST['hari'];
	$jam = $_POST['jam'];
	$matkul = $_POST['matkul'];
	$dosen = $_POST['dosen'];

	$update = mysqli_query($connect,"UPDATE t_jadwalkuliah set hari='$hari', jam='$jam', id_matkul='$matkul', id_dosen='$dosen' where id_jadwal='$id'") or die (mysqli_error($connect));
	if ($update) {
		$_SESSION['berhasil'] = "Berhasil Mengubah";
		echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Mengubah";
		echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
	}
?>