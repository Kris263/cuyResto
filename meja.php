<?php 
include "services/koneksi.php";
session_start();
if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == false) {
    header("location: login.php");
}
define("APP_NAME", "NOMOR MEJA ");


$no_meja = "";
$nama_pelanggan = "";
$update_notifikasi = "";

if(isset($_GET['no_meja']) && $_GET['no_meja'] !== "") {
    $no_meja = $_GET['no_meja'];
} else {
    echo "Meja tidak ditemukan";
}

if(isset($_GET['nama_pelanggan']) && $_GET['nama_pelanggan'] !== "") {
    $nama_pelanggan = $_GET['nama_pelanggan'];
    header("location: finish.php?no_meja=$no_meja&nama_pelanggan=$nama_pelanggan");
}

if (isset($_POST['btn-pesan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $jumlah_orang = $_POST['jumlah_orang'];

    $sql_update = "UPDATE meja SET nama_pelanggan = '$nama_pelanggan' , jumlah_orang = '$jumlah_orang' WHERE no_meja = '$no_meja'";
    $result_update = $conn -> query($sql_update);

    if($result_update) {
        header("location: index.php");
    } else {
        $update_notifikasi = "Data gagal diupdate, silahkan coba lagi";
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
    <title>Pesan Meja</title>
</head>

<body>
    <?php 
        include "layouts/header.php";
    ?>
    <div class="super-center">
        <h1><?= APP_NAME; echo $no_meja ?></h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

            <label for="">Nama Pelanggan</label>
            <input name="nama_pelanggan">

            <label for="">Jumlah Orang</label>
            <input name="jumlah_orang">

            <button type="submit" name="btn-pesan">Pesan Meja</button>
        </form>
    </div>
</body>

</html>