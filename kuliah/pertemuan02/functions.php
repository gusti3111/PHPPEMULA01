<?php
// koneksikan database
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw_123456');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // if (mysqli_num_rows($result) == 1) {
  //   return mysqli_fetch_assoc($result);
  // }
  $rows = [];
  // ambil data dari object result
  // mysqli_fetch_row() mengembalikan array numeric 

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{
  // menghubungkan ke database lewat fungsi koneksi
  $conn = koneksi();

  //post atau tambahkan data ke database
  $nama = htmlspecialchars($data['nama']);
  $NIK = htmlspecialchars($data['NIK']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  //query data dari database pakai syntax sql INSERT
  $query = "INSERT INTO
              students
              VALUES
              (null, '$nama', '$NIK', '$email', '$jurusan', '$gambar')";

  mysqli_query($conn, $query);

  $affected_rows = mysqli_affected_rows($conn);
  var_dump($affected_rows);

  return $affected_rows;
}
