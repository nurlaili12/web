<?php 

require 'function.php';

$id = $_GET["id"];

$data = query("SELECT * FROM mapel WHERE id = $id");



if (isset($_POST["submit"])) {
	
  if (ubah($_POST, 'mapel') > 0) {
  		echo "<script>
				alert('data successfully changed');
				document.location.href = '?hal=lihat_mapel'
  		      </script>";
  }else{
  	echo "<script>
				alert('data failed to change');
				document.location.href = '?hal=lihat_mapel'
  		  </script>";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>halaman edit</title>
</head>
<body>
	<form action="" method="post">
		<input type="hidden" name="id" id="id" value="<?= $data[0]["id"];?>">
	<div class="form-group">
        <label for="mapel">Mapel</label>
        <input type="text" class="form-control form-control-user" id="mapel" name="mapel" value="<?= $data[0]["mapel"];?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Ubah Data</button>
    </form>
</body>
</html>