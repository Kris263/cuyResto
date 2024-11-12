<?php 
include "services/koneksi.php";
session_start();

if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']) {
    header("location: index.php");
}

$login_notifikasi = "";
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result_admin = $conn->query($query_admin);

    if ($result_admin->num_rows > 0) {
        $admin = $result_admin -> fetch_assoc();

        $_SESSION['isLogin'] = true;
        $_SESSION['username'] = $admin['username'];
        header("location:index.php");
    } else {
        $login_notifikasi = "Akun admin tidak ditemukan";
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
    <title>LOGIN</title>
</head>

<body>
    <div class="super-center">
        <h1>LOGIN ADMIN</h1>
        <i> <?php echo $login_notifikasi ?> </i>
        <form action=" <?php $_SERVER['PHP_SELF']?>" method="POST">

            <label for="">Username</label>
            <input type="text" name="username">
            <label for="">Password</label>
            <input type="password" name="password">
            <button type="submit" name="btn-login">LOGIN</button>
        </form>
    </div>
</body>

</html>