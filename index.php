<?php 
require 'function.php';

$mahasiswa = query("SELECT * FROM tb_mahasiswa");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>DAFTAR MAHASISWA</h1>
<a href="create.php">CREATE DATA</a>
<table border="1" cellpadding="10" cellpadding="0">
	<tr>
		<th>No.</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Prodi</th>
		<th>Aksi</th>
	</tr>

	<?php $i =1; ?>
	<?php foreach ($mahasiswa as $data ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $data["nim"]; ?></td>
		<td><?= $data["nama"]; ?></td>
		<td><?= $data["prodi"]; ?></td>
		<td>
			<a href="update.php?id=<?= $data["id"]; ?>">Update</a> |
			<a href="delete.php?id=<?= $data["id"]; ?>">Delete</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>