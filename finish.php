<?php
include "services/koneksi.php"; 
session_start();
date_default_timezone_set("Asia/Makassar");

$no_meja = "";
$nama_pelanggan = "";

if($_SESSION['isLogin'] == false) {
    header("location: login.php");
}

if(isset($_GET['no_meja']) && $_GET['no_meja']) {
    $no_meja = $_GET['no_meja'];
}

if(isset($_GET['nama_pelanggan']) && $_GET['nama_pelanggan']) {
    $nama_pelanggan = $_GET['nama_pelanggan'];
}

if(isset($_POST['btn-finish'])) {
    $hari = date('Y-m-d');
    $jam = date('H:i:s');

    $sql_clear = "UPDATE meja SET nama_pelanggan = NULL , jumlah_orang = NULL WHERE no_meja = '$no_meja'";
    $sql_history = "INSERT INTO history (`no_meja`, `nama_pelanggan`, `hari`, `jam`) VALUES ('$no_meja', '$nama_pelanggan', '$hari', '$jam')";
    $result_clear = $conn -> query($sql_clear);
    $result_history = $conn -> query($sql_history);

    if($result_clear && $result_history) {
        header("location: index.php");
    } else {
        echo "Meja gagal diupdate";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Finish Order</title>
</head>

<body>
    <?php include "layouts/header.php"?>
    <div class="super-center">
        <h3>Order Atas Nama <?= $nama_pelanggan?></h3>
        <i>Dengan Nomor Meja <?= $no_meja ?></i>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <button type="submit" name="btn-finish">KOSONGKAN MEJA <?php echo $no_meja?></button>
        </form>
    </div>
</body>

</html>