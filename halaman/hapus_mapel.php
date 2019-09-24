<?php 
require 'function.php';

$id = $_GET["id"];

if (hapus($id, 'mapel') > 0) {
	echo "<script>
				alert('data successfully changed');
				document.location.href = '?hal=lihat_mapel'
  		      </script>";
  }else{
  	echo "<script>
				alert('data failed to change');
				document.location.href = '?hal=lihat_mapel'
  		  </script>";
  }


 ?>