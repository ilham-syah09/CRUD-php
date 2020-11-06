<?php 

// koneksi database

$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);

	$query = "INSERT INTO tb_mahasiswa
				VALUES
				('','$nim','$nama','$prodi')
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function update($data) {
	global $conn;
	$id = $data["id"];
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$prodi = htmlspecialchars($data["prodi"]);

	$query = "UPDATE tb_mahasiswa SET
				nim = '$nim',
				nama = '$nama',
				prodi = '$prodi'

				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

 ?>