<?php 
require 'function.php';


$id = $_GET['id'];

if (hapus($id , 'jurusan') > 0) {
	echo "<script>
			alert('data berhasil dihapus!')
			document.location.href = '?hal=lihat_jurusan'
		  </script>";
}else {
	echo "<script>
			alert('data gagal dihapus!')
			document.location.href  = '?hal=lihat_jurusan'
		  </script>";
}

?>