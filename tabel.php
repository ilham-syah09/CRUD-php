<?php 
require 'function.php';

$mahasiswa = query("SELECT * FROM tb_mahasiswa");

?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="bootstrap-4.5.3/dist/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3/dist/css/bootstrap.css">
<link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="toastr/toastr.min.css" rel="stylesheet">
  <script src="toastr/toastr.min.js"></script>
</head>
<body>


<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-info">
<div class="container">
  <a class="navbar-brand" href="#">
    <img src="image/ilham.png" width="30" height="30" alt="" loading="lazy">
  </a>
    <a class="navbar-brand" href="#">ILHAM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <!-- Navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="tabel.php">Tabel Data</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->

<!-- Table -->

<!-- Header -->
<div class="container pt-2" id="home">
<h3 class="text-center pt-5">DAFTAR MAHASISWA</h3>
  <hr class="divider my-4 bg-dark" />
<div class="row">
      <div class="col-lg-12">
    <div class="card shadow mb-2 ">
          <div class="card-header">
            <ul class="text-right">
        <a class="btn btn-primary float-right" data-toggle="modal" data-target="#modalAdd" href="tabel.php">Create</a>
        </ul>
          </div>
        <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-bordered" width="100%" cellspacing="0">
<?php 
if( isset($_POST["tambah"]) ) {


if( tambah($_POST) > 0 ) {
  echo "
      <script>
                  toastr.success('Data berhasil ditambahkan');
                  setTimeout(function() {
                  document.location.href = 'tabel.php';
                  }, 3000)
              </script>
    ";
} else {
  echo "<script>
                  toastr.success('Data gagal ditambahkan');
                  setTimeout(function() {
                  document.location.href = 'tabel.php';
                  }, 3000)
              </script>
    ";

}
}



?>
            
            <thead class="thead-dark">
              <tr class="table table-success">
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
          <?php $i =1; ?>
          <?php foreach ($mahasiswa as $data ) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nim"]; ?></td>
            <td><?= $data["nama"]; ?></td>
            <td><?= $data["prodi"]; ?></td>
            <td>
              <a class="badge badge-warning" href="#" data-toggle="modal" data-target="#modalEdit<?= $data["id"]; ?>">Update</a>
              <a class="badge badge-danger" href="tabel.php?id=<?= $data["id"]; ?>">Delete</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>
</div>
</div>


<!-- Modal Tambah data -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form action="" method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="nim">NIM</label>
                          <input type="text" class="form-control" id="nim" name="nim" required autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label for="prodi">Prodi</label>
                          <input type="text" class="form-control" id="prodi" name="prodi" required autocomplete="off">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
<!-- Modal Tambah data -->

<!-- Modal Edit data -->
<?php 

//cek tombol submit apasudah ditekan
if( isset($_POST["update"]) ) {


// cek apakah data berhasil ditambahkan
if( update($_POST) > 0 ) {
  echo "
      <script>
                  toastr.success('Data berhasil diupdate');
                  setTimeout(function() {
                  document.location.href = 'tabel.php';
                  }, 3000)
              </script>
    ";
} else {
  echo "<script>
                  toastr.success('Data gagal diupdate');
                  setTimeout(function() {
                  document.location.href = 'tabel.php';
                  }, 3000)
              </script>
    ";

}
}



?>
<?php foreach ($mahasiswa as $mhs) : ?>
      <div class="modal fade" id="modalEdit<?= $mhs["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <form action="" method="post">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <input type="hidden" value="<?= $mhs['id']; ?>" name="id">
                          <div class="form-group">
                              <label for="nim">Nim</label>
                              <input type="text" class="form-control" id="nim" name="nim" required autocomplete="off" value="<?= $mhs['nim']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $mhs['nama']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="prodi">Prodi</label>
                              <input type="text" class="form-control" id="prodi" name="prodi" required autocomplete="off" value="<?= $mhs['prodi']; ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-warning">Edit</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  <?php endforeach; ?>
<!-- Modal Edit data -->

<!-- Footer -->
  <div id="page-content">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-3 mt-3 lead">
      </div>
    </div>
  </div>
<footer class="py-4 bg-light text-black-50">
  <div class="container text-center">
    <small>Copyright &copy; Muhammad Ilham Sahputra</small>
  </div>
</footer>
<!-- Footer -->

<!-- delete -->
<?php

if( isset($_GET["id"]) ) {

$id = $_GET["id"];

  if (delete($id) > 0 ) {
      echo "
              <script>
                  toastr.success('Data berhasil dihapus');
                  setTimeout(function() {
                      document.location.href = 'tabel.php';
                  }, 3000)
              </script>
              ";
      } else {
          echo "<script>
                  toastr.error('Data gagal dihapus');
                  setTimeout(function() {
                      document.location.href = 'tabel.php';
                  }, 3000)
              </script>
              ";
  }
}

?>

<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap4.min.js"></script>
<script src="demo/datatables-demo.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  })
  </script>
</body>
</html>