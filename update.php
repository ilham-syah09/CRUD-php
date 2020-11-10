<?php 
require 'function.php';

// ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
//dimulai dari index ke 0
$mhs = query("SELECT * FROM tb_mahasiswa WHERE id = $id")[0];

?>