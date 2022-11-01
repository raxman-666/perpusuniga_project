<?php
	session_start();
	include "form/form_mahasiswa.php";
?>
<?php if(isset($_SESSION['berhasil'])){ ?>
	<script>
		Swal.fire(
		  '<?= $_SESSION['berhasil'] ?>',
		  'Data Mahasiswa',
		  'success'
		)
	</script>
<?php 
	session_destroy();
	}else{
?>
	<script>
		Swal.fire(
		  '<?= $_SESSION['gagal'] ?>',
		  '',
		  'warning'
		)
	</script>
<?php 
	session_destroy();
	}
?>
<!DOCTYPE html>
<html>
<body>
	<div style="width: 1300px; margin: auto; margin-top: 10px">
		<button style="margin-bottom: 10px; float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahMahasiswa"><i class="fa fa-plus"></i></button>
		<h3 style="text-align:center;">Data Mahasiswa</h3>
		<table class="table" id="dt-datatable" style="clear: both;">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama</th>
		      <th scope="col">NIM</th>
		      <th scope="col">Jurusan</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Username</th>
		      <th scope="col">Password</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	include "controller/connection.php";
		    	$query = mysqli_query($connect,"SELECT * FROM t_mahasiswa join t_jurusan ON t_mahasiswa.id_jurusan = t_jurusan.id_jurusan");
		    	$no = 0;
		    	while ($row = mysqli_fetch_array($query)){
		    		$no++;?>
		    		<tr>
				      <th><?=$no?></th>
				      <td><?=$row['nama_mahasiswa']?></td>
				      <td><?=$row['nim']?></td>
				      <td><?=$row['nama_jurusan']?></td>
				      <td><?=$row['alamat']?></td>
				      <td><?=$row['username']?></td>
				      <td><?=$row['password']?></td>
				      <td class="text-light">
				      	<a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahMahasiswa"
				      	data-idmahasiswa="<?= $row['id_mahasiswa'] ?>"
		                data-namamahasiswa="<?= $row['nama_mahasiswa'] ?>"
		                data-nim="<?= $row['nim'] ?>"
		                data-jurusan="<?= $row['id_jurusan'] ?>"
		                data-alamat="<?= $row['alamat'] ?>"
		                data-username="<?= $row['username'] ?>"
		                data-password="<?= $row['password'] ?>"
				      	><i class="fa fa-edit"></i></a>
				      	<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusMahasiswa"
				      	data-idmahasiswa="<?= $row['id_mahasiswa'] ?>"
		                data-namamahasiswa="<?= $row['nama_mahasiswa'] ?>"
				      	><i class="fa fa-trash"></i></a>
				      </td>
				    </tr>
		    	<?php } ?>
		  </tbody>
		</table>
	</div>
</body>

<script>
$(function(){
	$('#dt-datatable').DataTable();
    $('#ubahMahasiswa').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var idmahasiswa = button.data('idmahasiswa');
        var namamahasiswa = button.data('namamahasiswa');
        var nim = button.data('nim');
        var jurusan = button.data('jurusan');
        var alamat = button.data('alamat');
		var username = button.data('username');
		var password = button.data('password');
        var modal = $(this);
			modal.find('.modal-body #id-mahasiswa').val(idmahasiswa);
			modal.find('.modal-body #nama-mahasiswa').val(namamahasiswa);
			modal.find('.modal-body #nim').val(nim);
			modal.find('.modal-body #jurusan').val(jurusan);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #username').val(username);
            modal.find('.modal-body #password').val(password);
    });

    $('#hapusMahasiswa').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var idmahasiswa = button.data('idmahasiswa');
        var namamahasiswa = button.data('namamahasiswa');
        var modal = $(this);
        modal.find('.modal-body #id-hapus').val(idmahasiswa);
        modal.find('.modal-body #data-hapus').text(namamahasiswa);
    });
});
</script>

</html>