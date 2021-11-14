<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 604800");
header("Access-Control-Request-Headers: x-requested-with");
header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");
// include 'koneksi.php';



$servername = "localhost";
$dbname = "db_crud";
$username = "root";
$password = "admindatabase";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// $nama = "$_POST['nama']";

// $sql = "INSERT INTO tb_crud (nama) VALUES ('$nama')";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// $conn->close();



// if (isset($_FILES['input'])){
	$img_name = $_FILES['input']['name'];
    $tmp_name = $_FILES['input']['tmp_name'];

$namaFile2 = $_POST['input'];
// }

$connect = mysqli_connect("localhost", "root", "admindatabase", "db_crud");



$name = mysqli_real_escape_string($connect, $_POST['nama']);
$tanggal = mysqli_real_escape_string($connect, $_POST['tanggal']);
$description = mysqli_real_escape_string($connect, $_POST['description']);
$namaFile = mysqli_real_escape_string($connect, $_POST['gambar']);    
// $namaFile = $_FILES['gambar']['name'];
// $namaFile2 = $_FILES['gambar']['name'];
// $namaSementara = $_FILES['gambar']['tmp_name'];

$folderUpload = "./assets/uploads/";
// move_uploaded_file($folderUpload, $folderUpload.$namaFile2);
move_uploaded_file($folderUpload, $namaFile2);
// tentukan lokasi file akan dipindahkan
// $dirUpload = "terupload/";

// move_uploaded_file($_FILES["gambar"]["tmp_name"], 'file/'.$_FILES["gambar"]["name"]);

// $terupload = move_uploaded_file($namaSementara, $folderUpload.$namaFile2);



$sql ="INSERT INTO tb_crud (nama, modified, description, gambar) VALUES ('$name','$tanggal','$description','$namaFile')";
  $result = mysqli_query($connect,$sql)  ;    
  $return = array();
     if($result){
        $return['status'] = true;  
      }else{
         $return['status'] = false;  
      }
    echo json_encode($return);



?>