<?php
require 'functions.php';


// tampung  ke variabel students
$students = query("SELECT * FROM students");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>aksi</th>
    </tr>
    <tr>
      <?php $i = 1;
      foreach ($students as $pelajars) : ?>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $pelajars['gambar']; ?>" width="50"></td>
        <td><?= $pelajars['NIK']; ?></td>
        <td><?= $pelajars['nama']; ?></td>
        <td><?= $pelajars['email']; ?></td>
        <td><?= $pelajars['jurusan']; ?></td>
        <td>
          <a href="">ubah</a> | <a href="">hapus</a>
        </td>

      <?php endforeach; ?>
    </tr>

  </table>

</body>

</html>