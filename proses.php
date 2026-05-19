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
(nama, email, hp, posisi, portfolio, cover_letter, cv)

VALUES

('$nama', '$email', '$hp', '$posisi',
 '$portfolio', '$cover', '$cv')";

if (mysqli_query($conn, $query)) {

    echo "
    <h1>Lamaran Berhasil Dikirim!</h1>

    <p>
      Data berhasil masuk ke database.
    </p>

    <a href='index.html'>
      Kembali ke Form
    </a>
    ";

} else {

    echo "Error: " . mysqli_error($conn);
}

?>