<?php
	include "assets/css.php";
	include "assets/js.php";
	include "templates/header.php";
	include "controller/connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perpus Uniga</title>
</head>
<body>
	<div style="width: 1300px; margin: auto; margin-top: 10px;">
		<?php
		if (isset($_GET['page']))
			include('pages/'.$_GET['page'].'.php');
		else{
		?>
			<div id="kartu" style="height: 525px;">
				<div class="card border-dark mb-3 text-center" style="width: 18rem; float: left; margin: 20 45 50 5px;">
				  <div class="card-body">
				    <h5 class="card-title">Data Mahasiswa</h5>
				    <?php 
				    	$data_mahasiswa = mysqli_query($connect,"SELECT * FROM t_mahasiswa");
						$jumlah_mahasiswa = mysqli_num_rows($data_mahasiswa);
				    ?>
				    <p class="card-text">Jumlah data : <b><?php echo $jumlah_mahasiswa; ?></b></p>
				  </div>
				</div>
				<div class="card border-dark mb-3 text-center" style="width: 18rem; float: left; margin: 20 45 50 0px;">
				  <div class="card-body">
				    <h5 class="card-title">Data Jurusan</h5>
				    <?php 
				    	$data_jurusan = mysqli_query($connect,"SELECT * FROM t_jurusan");
						$jumlah_jurusan = mysqli_num_rows($data_jurusan);
				    ?>
				    <p class="card-text">Jumlah data : <b><?php echo $jumlah_jurusan; ?></b></p>
				  </div>
				</div>
				<div class="card border-dark mb-3 text-center" style="width: 18rem; float: left; margin: 20 45 50 0px;">
				  <div class="card-body">
				    <h5 class="card-title">Data Dosen</h5>
				    <?php 
				    	$data_dosen = mysqli_query($connect,"SELECT * FROM t_dosen");
						$jumlah_dosen = mysqli_num_rows($data_dosen);
				    ?>
				    <p class="card-text">Jumlah data : <b><?php echo $jumlah_dosen; ?></b></p>
				  </div>
				</div>
				<div class="card border-dark mb-3 text-center" style="width: 18rem; float: left; margin: 20 0 50 0px;">
				  <div class="card-body">
				    <h5 class="card-title">Data Matkul</h5>
				    <?php 
				    	$data_matkul = mysqli_query($connect,"SELECT * FROM t_matakuliah");
						$jumlah_matkul = mysqli_num_rows($data_matkul);
				    ?>
				    <p class="card-text">Jumlah data : <b><?php echo $jumlah_matkul; ?></b></p>
				  </div>
				</div>
				<div class="card border-dark mb-3 text-center" style="width: 18rem; clear: both; margin-left: 500px;">
				  <div class="card-body">
				    <h5 class="card-title">Data Jadwal</h5>
				    <?php 
				    	$data_jadwal = mysqli_query($connect,"SELECT * FROM t_jadwalkuliah");
						$jumlah_jadwal = mysqli_num_rows($data_jadwal);
				    ?>
				    <p class="card-text">Jumlah data : <b><?php echo $jumlah_jadwal; ?></b></p>
				  </div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
<?php include "templates/footer.php"; ?>
</html>