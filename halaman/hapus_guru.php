<?php 
require 'function.php';

$id = $_GET['id'];

if (hapus($id, 'guru') > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = '?hal=lihat_guru';
	      </script>";
}else{
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = '?hal=lihat_guru';
	      </script>";
}

 ?>