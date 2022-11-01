<?php
	session_start();
	include "form/form_matkul.php";
?>
<?php if(isset($_SESSION['berhasil'])){ ?>
	<script>
		Swal.fire(
		  '<?= $_SESSION['berhasil'] ?>',
		  'Data Matkul',
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
		<button style="margin-bottom: 10px; float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahMatkul"><i class="fa fa-plus"></i></button>
		<h3 style="text-align:center;">Data Matkul</h3>
		<table class="table" id="dt-datatable" style="clear: both;">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Kode Matkul</th>
		      <th scope="col">Nama Matkul</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	include "controller/connection.php";
		    	$query = mysqli_query($connect,"SELECT * FROM t_matakuliah");
		    	$no = 0;
		    	while ($row = mysqli_fetch_array($query)){
		    		$no++;?>
		    		<tr>
				      <th><?=$no?></th>
				      <td><?=$row['kode_matkul']?></td>
				      <td><?=$row['nama_matkul']?></td>
				      <td class="text-light">
				      	<a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahMatkul"
				      	data-idmatkul="<?= $row['id_matkul'] ?>"
		                data-kodematkul="<?= $row['kode_matkul'] ?>"
		                data-namamatkul="<?= $row['nama_matkul'] ?>"
				      	><i class="fa fa-edit"></i></a>
				      	<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusMatkul"
				      	data-idmatkul="<?= $row['id_matkul'] ?>"
		                data-namamatkul="<?= $row['nama_matkul'] ?>"
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
    $('#ubahMatkul').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var idmatkul = button.data('idmatkul');
        var kodematkul = button.data('kodematkul');
		var namamatkul = button.data('namamatkul');
        var modal = $(this);
			modal.find('.modal-body #id-matkul').val(idmatkul);
			modal.find('.modal-body #kode-matkul').val(kodematkul);
            modal.find('.modal-body #nama-matkul').val(namamatkul);
    });

    $('#hapusMatkul').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var idmatkul = button.data('idmatkul');
        var namamatkul = button.data('namamatkul');
        var modal = $(this);
        modal.find('.modal-body #id-hapus').val(idmatkul);
        modal.find('.modal-body #data-hapus').text(namamatkul);
    });
});
</script>

</html>