<?php 
include "services/pdf/fpdf.php";
include "services/koneksi.php";

if(isset($_POST['btn-report'])) {
    $hari = $_POST['hari'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "layouts/header.php"?>
    <div class="super-center">
        <h3>CETAK LAPORAN</h3>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <input type="date" name="hari">
            <button type="submit" name="btn-report">Generate Report</button>
        </form>
    </div>
</body>

</html>