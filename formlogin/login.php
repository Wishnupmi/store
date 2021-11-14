<?php
include("koneksi.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 604800");
header("Access-Control-Request-Headers: x-requested-with");
header("Access-Control-Allow-Headers: x-requested-with, x-requested-by");

// $username = $_POST['username'];
// $password = $_POST['password'];
// $username = "wishnupmi@gmail.com";
// $password = "123";

// $servername = "localhost";
// $dbname = "db_crud";
// $username = "root";
// $password = "admindatabase";

// $connect = mysqli_connect("localhost", "root", "admindatabase", "db_crud");
// $conn = mysqli_connect('localhost', 'root', '', 'blog');
$query = mysqli_query($connect, 'SELECT * FROM tb_crud');

while ($row = mysqli_fetch_assoc($query)) {
    $output[] = $row;
    // $output['pesan'] = "Berhasil masuk";
    // $output['id']=$row["Id"];
    // $output['username']=$row['Email'];
}
                    
echo json_encode($output);

// echo htmlspecialchars_decode("<b>df</b>");



// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
    
//     $output['pesan'] = "Berhasil masuk";
//     $output['id']=$row["Id"];
//     $output['username']=$row['Email'];

//   }
// } else {
//   // echo "0 results";
//   $output['error'] = true;
//   $output['pesan'] = "Gagal masuk";
// }
// echo json_encode($output);












//$database = file_get_contents("akun.json");
//$database = json_decode($database, TRUE);

//// echo $database[1]['id'];;
//// if(isset($username) && isset($password)) {
//    for($i=0; $i < count($database); $i++) {
//        // echo $database[$i]['username'];
 //       // if($database[$i]['username'] == $username) {
 //       //     if($database[$i]['password'] == $password) {
 //               $success = TRUE;
 //               // $output[$i]['pesan'] = "Berhasil masuk";
 //               $output[$i]['id']=$database[$i]['id'];
 //               $output[$i]['title']=$database[$i]['title'];
 //               $output[$i]['description']=$database[$i]['description'];
 //               $output[$i]['url_image']=$database[$i]['url_image'];
 //       //         break;
 //       //     } else {
 //       //         $success = FALSE;
 //       //         $output['error'] = true;
 //       //         $output['pesan'] = "Gagal masuk";
 //       //     }
 //       // } else {
 //       //     $success = FALSE;
//        // }
//    }
//// } else {
////     echo "Harap isi semua kolom yang tersedia";
//// }
//echo json_encode($output);






// $products [] = array(
//     'id' => '1',
//   'title' => 'Batang'
// );

// // Data 2
// $products [] = array(
//    'id' => '2',
//   'title' => 'Surabaya'
// );

// echo json_encode($products);



?>