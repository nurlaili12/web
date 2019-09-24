<?php 
 require 'function.php';

 $data = query("SELECT * FROM mapel");

if (isset($_POST["cari"])) {
  $data = cari($_POST["keyword"], 'mapel');

  }


?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>data mapel</title>
</head>
<body>
 
  <a href="?hal=tambah_mapel" class="btn btn-primary mb-4">Tambah Mapel</a>


  <h1>Daftar Mapel</h1>

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
      <th scope="col">Mapel</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($data as $dt) : ?>
    <tr>
      <th scope="row"><?= $i;  ?></th>
      <td><?= $dt["mapel"];  ?></td>
      <td>
         <a href="?hal=edit_mapel&id=<?php echo $dt['id']; ?>" class="badge badge-pill badge-success">edit</a>
          <a href="?hal=hapus_mapel&id=<?php echo $dt['id']; ?>" class="badge badge-pill badge-danger">hapus</a>
      </td>
    </tr>
    <?php $i++ ?>
  <?php endforeach; ?>
</tbody>
</table>
</body>
</html>