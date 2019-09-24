<?php 

require 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST, 'jurusan') > 0) {
        echo "<script>
                alert('data berhasil ditambahkan!')
                document.location.href = '?hal=lihat_jurusan'
              </script>";
    }else{
        echo "<script>
                alert('data gagal ditambahkan!')
                document.location.href = '?hal=lihat_jurusan'
              </script>";
    }
}

 ?>


<h1 class="h3 mb-4 text-gray-800">Tambah Jurusan</h1>

<form action="" method="post">
<div class="form-group">
        <label for="jurusan">Jurusan</label>
        <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Tambah Jurusan</button>
</form>`