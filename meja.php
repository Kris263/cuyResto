<?php 
define("APP_NAME", "BOOKING MEJA")
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
    <div class="super-center">
        <h1><?php echo APP_NAME ?></h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

            <label for="">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan">

            <label for="">Jumlah Orang</label>
            <input type="text" name="Jumlah Orang">

            <button type="submit" name="btn-pesan">Pesan Meja</button>
        </form>
    </div>
</body>

</html>