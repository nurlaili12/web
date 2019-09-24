<?php 
require 'function.php';

  $query = "SELECT `siswa`.*, `kelas`.`kelas`, `jurusan`.`jurusan`
              FROM `siswa` 
              JOIN `kelas` ON `siswa`.`kelas_id` = `kelas`.`id`
              JOIN `jurusan` ON `siswa`.`jurusan_id` = `jurusan`.`id`";
  $data = query($query);

  if (isset($_POST["cari"])) {
   $data = cari($_POST["keyword"], 'siswa');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>data siswa</title>
</head>
<body>
  <h1>Data Siswa</h1>
  
    <!-- Topbar Search -->
          <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-1 my-3 my-md-0 mw-10 navbar-search">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autofocus size="30">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="cari">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

  <table class="table table-hover mt-4">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nisn</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($data as $dt) : ?>
    <tr>
      <th scope="row"><?= $i;  ?></th>
      <td><?= $dt["nisn"];  ?></td>
      <td><?= $dt["nama"];  ?></td>
      <td><?= $dt["kelas"];  ?></td>
      <td><?= $dt["jurusan"];  ?></td>
      <td><?= $dt["email"];  ?></td>
      <td><a href="?hal=edit_siswa&id=<?= $dt["id"];?>" class="badge badge-pill badge-success">edit</a>
          <a href="?hal=hapus_siswa&id=<?= $dt["id"];?>" class="badge badge-pill badge-danger">hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>