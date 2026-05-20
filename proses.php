<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "lokerin"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$posisi = $_POST['posisi'];
$portfolio = $_POST['portfolio'];
$cover = $_POST['cover'];

$cv = $_FILES['cv']['name'];
$tmp = $_FILES['cv']['tmp_name'];

$folder = "upload/";

if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}

move_uploaded_file($tmp, $folder . $cv);

$query = "INSERT INTO lamaran
(
    nama,
    email,
    hp,
    posisi,
    portfolio,
    cover_letter,
    cv
)

VALUES

(
    '$nama',
    '$email',
    '$hp',
    '$posisi',
    '$portfolio',
    '$cover',
    '$cv'
)";

if (mysqli_query($conn, $query)) {

    echo "

    <style>

      body{
        font-family:Poppins;
        background:#f5f5f5;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
      }

      .box{
        background:white;
        padding:40px;
        border-radius:16px;
        box-shadow:0 10px 30px rgba(0,0,0,0.1);
        text-align:center;
      }

      h1{
        color:#0b1a2f;
      }

      a{
        display:inline-block;
        margin-top:20px;
        padding:12px 20px;
        background:#0b1a2f;
        color:gold;
        text-decoration:none;
        border-radius:8px;
      }

    </style>

    <div class='box'>

      <h1>
        Lamaran Berhasil Dikirim!
      </h1>

      <p>
        Data berhasil masuk ke database.
      </p>

      <a href='index.html'>
        Kembali ke Form
      </a>

    </div>

    ";

} else {

    echo "Error: " . mysqli_error($conn);
}

?>