<?php 
require 'function.php';
if( isset($_POST["submit"]) ) {


	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
			";

	}
}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>

	<h1>Tambah Data Mahasiswa</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required>
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="prodi">Prodi : </label>
				<input type="text" name="prodi" id="prodi" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>

	</form>

</body>
</html>