<?php
	session_start();
	if($_POST){
		$nama_matkul = $_POST['namamatkul'];
		$kodematkul = $_POST['kodematkul'];

		if (empty($kodematkul)) {
			$_SESSION['gagal'] = "Kode Matkul tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
		}elseif (empty($nama_matkul)) {
			$_SESSION['gagal'] = "Nama Matkul tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_matakuliah (nama_matkul, kode_matkul)
				value ('".$nama_matkul."','".$kodematkul."')") or die (mysqli_error($connect));
			if ($insert) {
				$_SESSION['berhasil'] = "Berhasil Menambah";
				echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
			}else{
				$_SESSION['gagal'] = "Gagal Menambah";
				echo "<script>location.href='../../index.php?page=data_matakuliah';</script>";
			}
		}
	}
?>