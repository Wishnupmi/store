<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 604800");
header("Access-Control-Request-Headers: x-requested-with");
header("Access-Control-Allow-Headers: x-requested-with, x-requested-by, Origin, X-Requested-With, Content-Type, Accept");

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


// ambil data file
$namaFile = $_FILES['input']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];



$namaFile2 = $_POST['input'];

echo $namaFile;
// tentukan lokasi file akan dipindahkan
$dirUpload = "./assets/uploads/";

// pindahkan file
$terupload = move_uploaded_file("C:\Windows\Temp\tmpf4j8.tmp", $dirUpload.$namaFile2);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
} else {
    echo "Upload Gagal!";
}
?>