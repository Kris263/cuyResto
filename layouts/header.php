<header>
    <div>
        <a href="index.php">CUYRESTO</a>
    </div>
    <div>
        <?php 
            if(isset($_SESSION['isLogin'])) {
                echo "<a href='logout.php'>logout</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
        ?>
    </div>
</header>