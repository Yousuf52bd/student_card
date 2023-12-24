 <?php
//   $conn = mysqli_connect("localhost","root","","yousufbd");
//     if(!$conn){
//      die('Can not connect mysqli server:' .mysqli_error());
//     }else{
//         //echo"Cannection Successful!";
//     }

$servername = "desh";
$database = "smartwebsale_yousufdb";
$username = "smartwebsale_user_Yousuf";
$password = "SOBO=&MM#YoB";
// Create connection using musqli_connect function
$conn = mysqli_connect($servername, $username, $password, $database);
// Connection Check
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

else{
   //echo "Connected Successfully!";
   $conn->close();
}


 ?>
