<?php 
include "services/koneksi.php";
session_start();
if($_SESSION['isLogin'] == false) {
    header("location: login.php");
}
define("APP_NAME", "CUYRESTO - WEBSITE PENERIMAAN TAMU");

$query_meja = "SELECT * FROM meja";
$result_meja = $conn -> query($query_meja);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo APP_NAME?></title>
</head>

<body>
    <?php 
    include "layouts/header.php";
    ?>

    <br>

    <h1 align="center">DAFTAR MEJA</h1>
    <div class="container">
        <?php 
                foreach ($result_meja as $meja) {
            ?>
        <div class="card" onclick="goToMeja(`<?= $meja['no_meja'] ?>` , `<?= $meja['nama_pelanggan'] ?>`)">
            <b><?php echo $meja['tipe_meja'] . " " . $meja['no_meja']?></b>
            <p>
                <?php 
                    if($meja['nama_pelanggan'] == NULL AND $meja['jumlah_orang'] == NULL) {
                        echo "Not Reserved";
                    } else {
                        echo $meja['nama_pelanggan'] . " " . $meja['jumlah_orang'] . " orang";
                    }
                ?>
            </p>
        </div>
        <?php } ?>

    </div>

    <script>
    function goToMeja(no_meja, nama_pelanggan) {
        const url = "meja.php";
        const params = `?no_meja=${no_meja}&nama_pelanggan=${nama_pelanggan}`
        window.location.replace(url + params);
    }
    </script>
</body>

</html>