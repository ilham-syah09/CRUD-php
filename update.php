<?php 
require 'function.php';

// ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
//dimulai dari index ke 0
$mhs = query("SELECT * FROM tb_mahasiswa WHERE id = $id")[0];

//cek tombol submit apasudah ditekan
if( isset($_POST["submit"]) ) {


// cek apakah data berhasil ditambahkan
	if( update($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diupdate');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal diupdate');
				document.location.href = 'index.php';
			</script>
			";

	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data Mahasiswa</title>
</head>
<body>

	<h1>Update Data Mahasiswa</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?> ">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?> ">
			</li>
			<li>
				<label for="prodi">Prodi : </label>
				<input type="text" name="prodi" id="prodi" value="<?= $mhs["prodi"]; ?> ">
			</li>
			<li>
				<button type="submit" name="submit">Update Data</button>
			</li>
		</ul>

	</form>

</body>
</html>