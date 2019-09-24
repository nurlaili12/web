<?php 
require 'function.php';

$id = $_GET["id"];

if (hapus($id, 'kelas') > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = '?hal=lihat_kelas'
		  </script>";
}else{
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = '?hal=lihat_kelas'
		  </script>";
}

?>