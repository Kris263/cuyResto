<?php 
include "services/pdf/fpdf.php";
include "services/koneksi.php";

if(isset($_POST['btn-report'])) {
    $hari = $_POST['hari'];
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle("Laporan Pengunjung");
    $pdf->SetFont("Arial", "B", 14);
    $pdf->Text(10, 6, "Laporan Pengunjung $hari");

    $pdf->Cell(22, 10, "No Meja",1 , 0);
    $pdf->Cell(44, 10, "Nama Pelanggan",1 , 0);
    $pdf->Cell(38, 10, "Hari Keluar",1 , 0);
    $pdf->Cell(38, 10, "Jam Keluar",1 , 0);
    $pdf->Cell(40, 10, "",0 , 1);

    $sql_report = "SELECT * FROM history WHERE hari='$hari'";
    $result_report = $conn->query($sql_report);
    if ($result_report->num_rows > 0) {
        foreach ($result_report as $report) {
            $pdf->Cell(22, 10, $report["no_meja"], 1, 0);
            $pdf->Cell(44, 10, $report["nama_pelanggan"],1 , 0);
            $pdf->Cell(38, 10, $report["hari"],1 , 0);
            $pdf->Cell(38, 10, $report["jam"],1 , 1);
        }
    } else {
        $pdf->Cell(0,10,"Tidak ada pelanggan hari ini", 0 ,1);
    }

    $pdf->Output();
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