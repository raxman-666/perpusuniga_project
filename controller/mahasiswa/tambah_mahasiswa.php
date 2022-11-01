<?php
	session_start();
	if($_POST){
		$nama_mahasiswa = $_POST['nama'];
		$nim = $_POST['nim'];
		$jurusan = $_POST['jurusan'];
		$alamat = $_POST['almat'];
		$username = $_POST['user'];
		$password = $_POST['pass'];

		if (empty($nama_mahasiswa)) {
			$_SESSION['gagal'] = "Nama Mahasiswa tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}elseif (empty($nim)) {
			$_SESSION['gagal'] = "NIM tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}elseif (empty($jurusan)) {
			$_SESSION['gagal'] = "Jurusan tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}elseif (empty($alamat)) {
			$_SESSION['gagal'] = "Alamat tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}elseif (empty($username)) {
			$_SESSION['gagal'] = "Username tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}elseif (empty($password)) {
			$_SESSION['gagal'] = "Password tidak boleh kosong !";
			echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
		}else{
			include "../connection.php";
			$insert = mysqli_query($connect,"iNSERT INTO t_mahasiswa (nama_mahasiswa, nim, id_jurusan, alamat, username, password)
				value ('".$nama_mahasiswa."','".$nim."','".$jurusan."','".$alamat."','".$username."','".$password."')") or die (mysqli_error($connect));

			if ($insert) {
				$_SESSION['berhasil'] = "Berhasil Menambah";
				echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
			}else{
				$_SESSION['gagal'] = "Gagal Menambah";
				echo "<script>location.href='../../index.php?page=data_mahasiswa';</script>";
			}
		}
	}
?>