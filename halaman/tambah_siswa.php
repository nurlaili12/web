<?php 
require 'function.php';

if(isset($_POST["submit"])) {

// cek aoakah data berhasil ditambahkan
	if(tambah($_POST, 'siswa') > 0 ){
		echo "<script>
				alert('data berhasil ditambahkan');
				document.location.href = '?hal=lihat_siswa'
		      </script>";
	}else{
		echo "<script>
				alert('data gagal ditambahkan');
				document.location.href = '?hal=lihat_siswa'
		      </script>";
	}
}

$tambah = query("SELECT * FROM kelas");

$jurusan = query("SELECT * FROM jurusan");



 ?>
<h1 class="h3 mb-4 text-gray-800">Tambah Siswa</h1>
<form action="" method="post">
<div class="form-group">
        <label for="nis">NISN</label>
        <input type="text" class="form-control form-control-user" id="nis" name="nis" required  placeholder="Masukkan Nisn...">
    </div>
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control form-control-user" id="nama" name="nama" autocomplete  placeholder="Masukkan Nama...">
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select class="form-control" id="kelas" name="kelas" >
            <option value="">Pilih Kelas..</option>
        <?php foreach ($tambah as $tb) : ?>
          <option value="<?php echo $tb['id']; ?>"><?= $tb["kelas"]; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kelas">Jurusan</label>
        <select class="form-control" id="jurusan" name="jurusan">
            <option value="">Pilih Jurusan..</option>
        <?php foreach ($jurusan as $js) : ?>
          <option value="<?php echo $js['id']; ?>"><?= $js["jurusan"]; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
     <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control form-control-user" id="email" name="email"  placeholder="Masukkan Email..." autocomplete >
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Tambah siswa</button>
</form>`