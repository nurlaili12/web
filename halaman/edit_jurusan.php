<?php 
require 'function.php';

$id = $_GET["id"];


$data = query("SELECT * FROM jurusan WHERE id = $id");

 if(isset($_POST['submit'])) {

		if (ubah($_POST, 'jurusan') > 0 ) {
			echo "<script>
					alert('data berhasil diubah');
					document.location.href = '?hal=lihat_jurusan';
				  </script>";
		}else{
				echo "<script>
					alert('data gagal diubah');
					document.location.href = '?hal=lihat_jurusan';
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
        <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" value="<?= $data[0]["jurusan"];?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Ubah Data</button>
    </form>
</body>
</html>