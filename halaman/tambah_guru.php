<?php 
require 'function.php';

// cek apakah submit sudah dtekan apa belom

if(isset($_POST["submit"])) {

// cek apakah data sudah berhasil ditambahkan

if (tambah($_POST, 'guru') > 0 ) {
	echo "<script>
			alert('data telah berhasil di tambahkan!');
			document.location.href = '?hal=lihat_guru';
		  </script>";
} else {
	echo "<script>
			alert('data gagal di tambahkan!');
			document.location.href = '?hal=lihat_guru';
		  </script>";
}
 
}

$mapel = query("SELECT * FROM mapel");

 ?>



<h1 class="h3 mb-4 text-gray-800 ">Tambah Guru</h1>

    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Nomor Induk Pegawai" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="mapel" >Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                          <option>Masukkan Pilihan..</option>
                        <?php foreach ($mapel as $mp) : ?>
                          <option value="<?php echo $mp['id'] ?>"><?= $mp["mapel"]; ?></option>
                        <?php endforeach; ?>
                        </select>
                     </div>
 
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Tambah Guru</button>


                </form>
        </div>
    </div>