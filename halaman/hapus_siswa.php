<?php 
require 'function.php';

$id = $_GET['id'];

if(hapus($id, 'siswa') > 0 ) {
	echo "<script>
			alert('data sudah berhasil!');
			document.location.href = '?hal=lihat_siswa';
	      </script>";
}else{
		echo "<script>
			alert('data sudah berhasil!');
			document.location.href = '?hal=lihat_siswa';
	      </script>";
}

 ?>