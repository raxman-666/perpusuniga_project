<?php
	session_start();
	if($_POST){
		$nama_dosen = $_POST['namadosen'];
		$alamat = $_POST['almat'];
		$telepon = $_POST['telepon'];

		if (empty($nama_dosen)) {
			$_SESSION['gagal'] = "Nama Dosen tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_dosen';</script>";
		}elseif (empty($alamat)) {
			$_SESSION['gagal'] = "Alamat tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_dosen';</script>";
		}elseif (empty($telepon)) {
			$_SESSION['gagal'] = "Nomor Telepon tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_dosen';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_dosen (nama_dosen, alamat, telepon)
				value ('".$nama_dosen."','".$alamat."','".$telepon."')") or die (mysqli_error($connect));
			if ($insert) {
				$_SESSION['berhasil'] = "Berhasil Menambah";
				echo "<script>location.href='../../index.php?page=data_dosen';</script>";
			}else{
				$_SESSION['gagal'] = "Gagal Menambah";
				echo "<script>location.href='../../index.php?page=data_dosen';</script>";
			}
		}
	}
?>