<?php
	session_start();
	include "../connection.php";

	$id = $_POST['id_matkul'];
	$nama_matkul = $_POST['namamatkul'];
	$kodematkul = $_POST['kodematkul'];

	$update = mysqli_query($connect,"UPDATE t_matakuliah set nama_matkul='$nama_matkul', kode_matkul='$kodematkul' where id_matkul='$id'") or die (mysqli_error($connect));
	if ($update) {
		$_SESSION['berhasil'] = "Berhasil Mengubah";
		echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
	}else{
		$_SESSION['gagal'] = "Gagal Mengubah";
		echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
	}
?>