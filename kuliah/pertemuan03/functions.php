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
              students02
              VALUES
              (null, '$nama', '$NIK', '$email', '$jurusan', '$gambar')";

  mysqli_query($conn, $query);

  $affected_rows = mysqli_affected_rows($conn);


  return $affected_rows;
}

// fungsi hapus
function delete($id)
{
  // koneksikan ke database
  $conn = koneksi();
  //  query pakai perintah sql untuk menghapus 
  $query = "DELETE FROM students02  WHERE id = $id";
  // guanakan mysqli query untuk query dan koneksikan database
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

// fungsi ubah
// function change($data)
// {
//   // menghubungkan ke database lewat fungsi koneksi
//   $conn = koneksi();

//   //post atau tambahkan data ke database
//   $id = $data["id"];
//   $nama = htmlspecialchars($data["nama"]);
//   $NIK = htmlspecialchars($data["NIK"]);
//   $email = htmlspecialchars($data["email"]);
//   $jurusan = htmlspecialchars($data["jurusan"]);
//   $gambar = htmlspecialchars($data["gambar"]);

//   //query data dari database pakai syntax sql UPDATE 
//   $query = "UPDATE students02 SET
//             nama = '$nama',
//             NIK = '$NIK',
//             email = '$email'
//             jurusan = '$jurusan',
//             gambar = '$gambar'
//           WHERE id = $id 
//            ";
//   mysqli_query($conn, $query);

//   return mysqli_affected_rows($conn);
// }

function change($data)
{
  $conn = koneksi();
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);

  $NIK = htmlspecialchars($data["NIK"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);
  // ambil data dari database dan update dimana id 
  $query = "UPDATE students02 SET
             nama = '$nama',
             NIK = '$NIK',
             email = '$email',
             jurusan = '$jurusan',
             gambar = '$gambar'
            WHERE id = $id
             ";
  // ambil data 
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
