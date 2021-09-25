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
function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $type_file = $_FILES['gambar']['type'];
  $size_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];



  // ketika tidak ada gambar dipilih/click
  if ($error === 4) {
    echo "<script>
         alert('choose your image');
         </script>";
    return false;
  }
  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('itu bukan gambar');
          </script>";
    return false;
  }



  // cek type file
  if ($type_file != 'image/jpeg' && $type_file != 'image/png') {
    echo "<script>
          alert('itu bukan gambar');
         </script>";
    return false;
  }



  // cek ukuran file 
  if ($size_file > 5000000) {
    echo "<script>
          alert('file terlalu besar');
         </script>";
    return false;
  }

  // siap upload file
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
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
  // $gambar = htmlspecialchars($data['gambar']);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
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

  // menghapus gambar folder image
  $m = query("SELECT * FROM students02 WHERE id = $id");
  if ($m['gambar'] != 'No_image.jpg') {
    unlink('img/' . $m['gambar']);
  }
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
  $gambar_lama = htmlspecialchars($data["gambar_lama"]);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }


  if ($gambar == 'No_image.jpg') {
    $gambar = $gambar_lama;
  }
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

// fungsi search
// function cari($keyword)
// {
//   $conn = koneksi();
//   $query = "SELECT * FROM students02
//               WHERE 
//             nama LIKE '%keyword%'
//           ";

//   $result = mysqli_query($conn, $query);
//   $rows = [];
//   // ambil data dari object result
//   // mysqli_fetch_row() mengembalikan array numeric 

//   while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//   }
//   return $rows;
// }
function cari($keyword)
{
  $query = "SELECT * FROM students02
             WHERE 
           nama LIKE '%$keyword%'
          ";

  return query($query);
}


// function login 

function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM user WHERE username = '$username'")) {


    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  }
  return [
    'error' => true,
    'pesan' => 'Username/ Password Salah!'
  ];
}


// fungsi registrasi
function registrasi($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = htmlspecialchars(strtolower($data['password1']));
  $password2 = htmlspecialchars(strtolower($data['password2']));


  // jika password dan username kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
         alert('username/password is not empty!');
         document.location.href = 'registarsi.php';
        </script>";

    return false;
  }
  // jika username sudah ada
  if (query("SELECT * FROM user  WHERE username = '$username'")) {
    echo "<script>
             alert('username sudah ada');
             document.location.href = 'registrasi.php';
          </script>";
    return false;
  }
  // jika konifrmasi passowrd tidak sesuai 
  if ($password1 !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
            docuoment.location.href = 'registrasi.php';
            </script>";
    return false;
  }

  // jika password baru tidak sesuai 
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // insert ke table user
  $query = "INSERT INTO user 
             VALUES
            (null, '$username', '$password_baru')
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
