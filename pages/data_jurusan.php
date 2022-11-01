<?php
	session_start();
	include "form/form_jurusan.php";
?>
<?php if(isset($_SESSION['berhasil'])){ ?>
	<script>
		Swal.fire(
		  '<?= $_SESSION['berhasil'] ?>',
		  'Data Jurusan',
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
		<button style="margin-bottom: 10px; float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJurusan"><i class="fa fa-plus"></i></button>
		<h3 style="text-align:center;">Data Jurusan</h3>
		<table class="table" id="dt-datatable" style="clear: both;">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Kode Jurusan</th>
		      <th scope="col">Nama Jurusan</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	include "controller/connection.php";
		    	$query = mysqli_query($connect,"SELECT * FROM t_jurusan");
		    	$no = 0;
		    	while ($row = mysqli_fetch_array($query)){
		    		$no++;?>
		    		<tr>
				      <th><?=$no?></th>
				      <td><?=$row['kode_jurusan']?></td>
				      <td><?=$row['nama_jurusan']?></td>
				      <td class="text-light">
				      	<a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahJurusan"
				      	data-idjurusan="<?= $row['id_jurusan'] ?>"
		                data-kodejurusan="<?= $row['kode_jurusan'] ?>"
		                data-namajurusan="<?= $row['nama_jurusan'] ?>"
				      	><i class="fa fa-edit"></i></a>
				      	<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusJurusan"
				      	data-id_jurusan="<?= $row['id_jurusan'] ?>"
		                data-namajurusan="<?= $row['nama_jurusan'] ?>"
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
    $('#ubahJurusan').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var idjurusan = button.data('idjurusan');
        var kodejurusan = button.data('kodejurusan');
        var namajurusan = button.data('namajurusan');
        var modal = $(this);
			modal.find('.modal-body #id-jurusan').val(idjurusan);
			modal.find('.modal-body #kode-jurusan').val(kodejurusan);
			modal.find('.modal-body #nama-jurusan').val(namajurusan);
    });

    $('#hapusJurusan').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var id_jurusan = button.data('id_jurusan');
        var namajurusan = button.data('namajurusan');
        var modal = $(this);
        modal.find('.modal-body #id-hapus').val(id_jurusan);
        modal.find('.modal-body #data-hapus').text(namajurusan);
    });
});
</script>

</html>