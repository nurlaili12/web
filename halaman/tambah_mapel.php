<?php 
require 'function.php';

if (isset($_POST["submit"])) {
	



if (tambah($_POST, 'mapel') > 0) {
	echo "<script>
			alert('Data successfully added');
			document.location.href = '?hal=lihat_mapel'
	      </script>";
}else{
	echo "<script>
			alert('data failed to add');
			document.location.href = '?hal=lihat_mapel'
	      </script>";
}
}




 ?>
<h1 class="h3 mb-4 text-gray-800">Tambah Mapel</h1>
<form action="" method="post">
<div class="form-group">
        <label for="mapel">Mapel</label>
        <input type="text" class="form-control form-control-user" id="mapel" name="mapel" placeholder="">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Tambah Mapel</button>
</form>