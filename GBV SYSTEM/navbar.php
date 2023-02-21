
<link rel="stylesheet" href="./css/navbar.css">

<div class="admin">
<h3> WELCOME</h3>
</div>

<header class="topnav">
    <nav class="navbar">
        <?php
        if (isset($_SESSION['admin'])) {
            echo '
            <div class="welcome">
                <a id="logout" href="logout.php">Admin log out</a>
            </div>
            ';
        } 
        ?>

    </nav>
</header>
<!-- <a href="#" >Welcome, ' .  $user['firstName'] . '</a> -->