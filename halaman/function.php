<?php 

//koneksi ke database 
	$connect = mysqli_connect("localhost", "root", "", "db_sekolah");

	function query($query) {
		global $connect;
		$result = mysqli_query($connect, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		
		return $rows;
	}


	function tambah($data, $type) {
		global $connect;

		if($type == 'guru') {

			$nik = $data["nip"];
			$nama = $data["nama"];
			$mapel = $data["mapel"];

			$query = "INSERT INTO guru VALUES( '', '$nik', '$nama', '$mapel')";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);

		}
		else if($type == 'kelas') {

			$kelas = $data["kelas"];
	

			$query = "INSERT INTO kelas VALUES('', '$kelas')";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);

		}
		else if ($type == 'jurusan') {
			$jurusan = $data["jurusan"];

			$query = "INSERT INTO jurusan VALUES('', '$jurusan')";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
		else if($type == 'siswa') {
			$nisn = $data["nis"];
			$nama = $data["nama"];
			$kelas = $data["kelas"];
			$jurusan = $data["jurusan"];
			$email = $data["email"];

			$query = "INSERT INTO siswa VALUES('', '$nisn', '$nama', '$kelas', '$jurusan', '$email')";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
		elseif ($type == 'mapel') {
			$mapel = $data["mapel"];

			$query = "INSERT INTO mapel VALUES('','$mapel')";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
	}


	function hapus($id, $type) {
		if ($type == 'kelas') {

			global $connect;

			mysqli_query($connect, "DELETE FROM kelas WHERE id = $id");

			return mysqli_affected_rows($connect);

		}
		else if ($type == 'guru') {

			global $connect;

			mysqli_query($connect, "DELETE FROM guru WHERE id = $id");

			return mysqli_affected_rows($connect);
		}
		else if ($type == 'siswa') {

			global $connect;

			mysqli_query($connect, "DELETE FROM siswa WHERE id = $id");

			return mysqli_affected_rows($connect);
		}
		elseif ($type == 'jurusan') {
			
			global $connect;

			mysqli_query($connect, "DELETE FROM jurusan WHERE id = $id");

			return mysqli_affected_rows($connect);
		}
		elseif ($type == 'mapel') {
			global $connect;

			mysqli_query($connect, "DELETE FROM mapel WHERE id = $id");

			return mysqli_affected_rows($connect);
		}

	}


	function ubah($data, $type) {
		if ($type == 'kelas') {
	
		global $connect;

		$id = $data["id"];
		$kelas = $data["kelas"];

		$query = "UPDATE kelas SET kelas = '$kelas' WHERE id='$id' "; 
		mysqli_query($connect, $query);

		return mysqli_affected_rows($connect); 

		}
		else if($type == 'guru') {

			global $connect;

			$id = $data["id"];
			$nip = $data["nip"];
			$nama = $data["nama"];
			$mapel = $data["mapel"];

			$query = "UPDATE guru SET
					  nip = '$nip',
					  nama = '$nama',
					  mapel_id = '$mapel'
					  WHERE id = '$id' ";
			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
		else if($type == 'siswa') {

			global $connect;

			$id = $data["id"];
			$nisn = $data["nisn"];
			$nama = $data["nama"];
			$kelas = $data["kelas"];
			$jurusan = $data["jurusan"];
			$email = $data["email"];

			$query = "UPDATE siswa SET
					  nisn = '$nisn',
					  nama = '$nama',
					  kelas_id = '$kelas',
					  jurusan_id = '$jurusan',
					  email = '$email'
					  WHERE id = $id";

			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
		elseif($type == 'jurusan') {

			global $connect;

			$id = $data["id"];
			$jurusan =$data["jurusan"];

			$query = "UPDATE jurusan SET 
					  jurusan = '$jurusan' 
					  WHERE id = '$id'";

			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}
		elseif ($type == 'mapel') {
			global $connect;

			$id = $data["id"];
			$mapel = $data["mapel"];

			$query = "UPDATE mapel SET
			          mapel = '$mapel'
			          WHERE id = '$id'";

			mysqli_query($connect, $query);

			return mysqli_affected_rows($connect);
		}

	}


		function register($data) {

			global $connect;

			$username = strtolower(stripcslashes($data["username"]));
			$email = strtolower(stripcslashes($data["email"]));
			$password = mysqli_real_escape_string($connect, $data["password"]);
			$password2 = mysqli_real_escape_string($connect, $data["password2"]);

			if ($password !== $password2) {
				echo "<script>
						alert('user tidak sesuai!');
					  </script>";

					  return false;
			}

			// enkripsi password
			$password = password_hash($password, PASSWORD_DEFAULT);

			// menambahkan user baru
			mysqli_query($connect,"INSERT INTO user VALUES('', '$username', '$email', '$password')");

			return mysqli_affected_rows($connect);
		}



	function cari($keyword, $type) {
		if ($type == 'guru') {
			
			$query = "SELECT `guru`.*, `mapel`.`mapel`
              		  FROM `guru`JOIN `mapel` 
                      ON `guru`.`mapel_id` = `mapel`.`id` 
                      WHERE 
					  nama LIKE '%$keyword%' OR 
					  nip LIKE '%$keyword%' OR
					  mapel LIKE '%$keyword%'
					  ";

			return query($query);	
		}

		elseif ($type == 'kelas') {
		
			$query = "SELECT * FROM kelas WHERE 
					  kelas LIKE '%$keyword%'
					  ";

			return query($query);

		}

		elseif ($type == 'siswa') {

			$query = "SELECT `siswa`.*, `kelas`.`kelas`, `jurusan`.`jurusan`
              		  FROM `siswa` 
                      JOIN `kelas` ON `siswa`.`kelas_id` = `kelas`.`id`
                      JOIN `jurusan` ON `siswa`.`jurusan_id` = `jurusan`.`id`
                      WHERE
					  nisn LIKE '%$keyword%' OR
					  nama LIKE '%$keyword%' OR
					  kelas LIKE '%$keyword%' OR
					  jurusan LIKE '%$keyword%' OR
					  email LIKE '%$keyword%' 
					  ";
					  
			return query($query);
		}

		elseif ($type == 'jurusan') {

			$query = "SELECT * FROM jurusan 
					  WHERE
					  jurusan LIKE '%$keyword%'
					  ";

			return query($query);
		}
		elseif ($type == 'mapel') {
			$query = "SELECT * FROM mapel WHERE
					  mapel LIKE '%$keyword%'
					  ";
		}
	}
 ?>