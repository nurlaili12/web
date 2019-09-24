<?php 
require 'function.php';

// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])) {


// cek apakah data sudah nerhasil ditambahkan
if(tambah($_POST, 'kelas') > 0 ) {
	echo "<script>
			alert('data sudah berhasil di tambahkan!');
			document.location.href ='?hal=lihat_kelas'
	      </script>";
}else{
	echo "<script>
			alert('data gagal di tambahkan');
			document.location.href = '?hal=lihat_kelas'
	      </script>";
}
}


 ?>
<h1 class="h3 mb-4 text-gray-800">Tambah Kelas</h1>
<form action="" method="post">
<div class="form-group">
        <label for="kelas">Kelas</label>
        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Tambah Kelas</button>
</form>