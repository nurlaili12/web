<?php 
require 'function.php';

$id = $_GET['id'];

    $data = query("SELECT * FROM siswa WHERE id = $id");

if (isset($_POST['submit'])) {

    // var_dump($_POST); die;

if(ubah($_POST, 'siswa') > 0 ){
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = '?hal=lihat_siswa'
          </script>";
}else{
      echo "<script>
            alert('data gagal diubah!');
            document.location.href = '?hal=lihat_siswa'
          </script>";
}
} 

$tambah =query("SELECT * FROM kelas");


$jurusan = query("SELECT * FROM jurusan");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit siswa</title>
</head>
<body>
	<form action="" method="post">
		<input type="hidden" name="id" id="id" value="<?= $data[0]["id"];?>">
	<div class="form-group">
        <label for="nip">Nisn</label>
        <input type="text" class="form-control form-control-user" id="nip" name="nisn" value="<?= $data[0]["nisn"];?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $data[0]["nama"];?>">
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select class="form-control" id="kelas" name="kelas">
         <?php foreach ($tambah as $tb) : ?>
            <option value="<?php echo $tb['id']; ?>" <?php if($data[0]['kelas_id'] == $tb['id']){echo "selected";} ?>><?= $tb["kelas"]; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select class="form-control" name="jurusan" id="jurusan">
          <?php foreach ($jurusan as $js) : ?>
           <option value="<?php echo $js['id']; ?>" <?php if($data[0]['jurusan_id'] == $js['id']){echo "selected";} ?>><?= $js["jurusan"]; ?> </option>
          <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $data[0]["email"];?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mt-4">Ubah Data</button> 
	</form>
</body>
</html>