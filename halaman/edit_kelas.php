<?php 
require 'function.php';

$id = $_GET["id"];


$data = query("SELECT * FROM kelas WHERE id = $id");

 if(isset($_POST['submit'])) {

if (ubah($_POST, 'kelas') > 0 ) {
	echo "<script>
			alert('data berhasil diubah');
			document.location.href = '?hal=lihat_kelas'
		  </script>";
}else{
		echo "<script>
			alert('data gagal diubah');
			document.location.href = '?hal=lihat_kelas'
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
        <label for="kelas">Kelas</label>
        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" value="<?= $data[0]["kelas"];?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Ubah Data</button>
    </form>
</body>
</html>