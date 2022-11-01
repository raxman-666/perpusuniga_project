<?php
	session_start();
	if($_POST){
		$kode = $_POST['kode'];
		$nama = $_POST['namajurusan'];

		if (empty($kode)) {
			$_SESSION['gagal'] = "Kode Jurusan tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
		}elseif (empty($nama)) {
			$_SESSION['gagal'] = "Nama Jurusan tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_jurusan (kode_jurusan, nama_jurusan)
				value ('".$kode."','".$nama."')") or die (mysqli_error($connect));
			if ($insert) {
				$_SESSION['berhasil'] = "Berhasil Menambah";
				echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
			}else{
				$_SESSION['gagal'] = "Gagal Menambah";
				echo "<script>location.href='../../index.php?page=data_jurusan';</script>";
			}
		}
	}
?>