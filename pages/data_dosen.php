<?php
	session_start();
	include "form/form_dosen.php";
?>
<?php if(isset($_SESSION['berhasil'])){ ?>
	<script>
		Swal.fire(
		  '<?= $_SESSION['berhasil'] ?>',
		  'Data Dosen',
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
		<button style="margin-bottom: 10px; float: right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahDosen"><i class="fa fa-plus"></i></button>
		<h3 style="text-align:center;">Data Dosen</h3>
		<table class="table" id="dt-datatable" style="clear: both;">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama Dosen</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Telepon</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	include "controller/connection.php";
		    	$query = mysqli_query($connect,"SELECT * FROM t_dosen");
		    	$no = 0;
		    	while ($row = mysqli_fetch_array($query)){
		    		$no++;?>
		    		<tr>
				      <th><?=$no?></th>
				      <td><?=$row['nama_dosen']?></td>
				      <td><?=$row['alamat']?></td>
				      <td><?=$row['telepon']?></td>
				      <td class="text-light">
				      	<a type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahDosen"
				      	data-iddosen="<?= $row['id_dosen'] ?>"
		                data-namadosen="<?= $row['nama_dosen'] ?>"
		                data-alamat="<?= $row['alamat'] ?>"
		                data-telepon="<?= $row['telepon'] ?>"
				      	><i class="fa fa-edit"></i></a>
				      	<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusDosen"
				      	data-iddosen="<?= $row['id_dosen'] ?>"
		                data-namadosen="<?= $row['nama_dosen'] ?>"
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
    $('#ubahDosen').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var iddosen = button.data('iddosen');
        var namadosen = button.data('namadosen');
        var alamat = button.data('alamat');
		var telepon = button.data('telepon');
        var modal = $(this);
			modal.find('.modal-body #id-dosen').val(iddosen);
			modal.find('.modal-body #nama-dosen').val(namadosen);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #telepon').val(telepon);
    });

    $('#hapusDosen').on('show.bs.modal', function(event){

        var button = $(event.relatedTarget);
        var iddosen = button.data('iddosen');
        var namadosen = button.data('namadosen');
        var modal = $(this);
        modal.find('.modal-body #id-hapus').val(iddosen);
        modal.find('.modal-body #data-hapus').text(namadosen);
    });
});
</script>

</html>