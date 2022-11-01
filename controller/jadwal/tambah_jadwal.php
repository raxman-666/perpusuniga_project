<?php
	session_start();
	if($_POST){
		$hari = $_POST['hari'];
		$jam = $_POST['jam'];
		$matkul = $_POST['matkul'];
		$dosen = $_POST['dosen'];

		if (empty($hari)) {
			$_SESSION['gagal'] = "Hari tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
		}elseif (empty($jam)) {
			$_SESSION['gagal'] = "Jam tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
		}elseif (empty($matkul)) {
			$_SESSION['gagal'] = "Nama Matkul tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
		}elseif (empty($dosen)) {
			$_SESSION['gagal'] = "Nama Dosen tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_jadwalkuliah (hari, jam, id_matkul, id_dosen)
				value ('".$hari."','".$jam."','".$matkul."','".$dosen."')") or die (mysqli_error($connect));
			if ($insert) {
				$_SESSION['berhasil'] = "Berhasil Menambah";
				echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
			}else{
				$_SESSION['gagal'] = "Gagal Menambah";
				echo "<script>location.href='../../index.php?page=data_jadwal';</script>";
			}
		}
	}
?>