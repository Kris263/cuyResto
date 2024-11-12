<?php 
$hostname ="localhost";
$db_name ="cuyresto";
$username ="root";
$password ="";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if ($conn->connect_error) {
    echo "Koneksi Gagal";
    die();
}
?>