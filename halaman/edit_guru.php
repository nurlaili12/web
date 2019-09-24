<?php
require 'function.php';

$id = $_GET["id"];

$data = query("SELECT * FROM guru WHERE id = $id");

if(isset($_POST['submit'])) {

if (ubah($_POST, 'guru') > 0) {

	echo "<script>
			alert('data berhasil diubah!');
			document.location.href = '?hal=lihat_guru';
	      </script>";
}else{
	echo "<script>
			alert('data berhasil diubah!');
			document.location.href = '?hal=lihat_guru';
	      </script>";

}
}
$mapel = query("SELECT * FROM mapel");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit_guru</title>
</head>
<body>
	<form action="" method="post">
		<input type="hidden" name="id" id="id" value="<?= $data[0]["id"];?>">
	<div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control form-control-user" id="nip" name="nip" value="<?= $data[0]["nip"];?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $data[0]["nama"];?>">
    </div>
    <div class="form-group">
        <label for="mapel">Mapel</label>
        <select class="form-control" name="mapel" id="mapel">
        	<?php foreach ($mapel as $mp) : ?>
        		<option value="<?php echo $mp['id']; ?>" <?php if ($data[0]['mapel_id'] == $mp['id']){echo "selected";} ?>><?php echo $mp["mapel"]; ?></option>
        	<?php endforeach; ?>
        </select>
	</div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mt-4">Ubah Data</button>
	</form>
</body>
</html>
