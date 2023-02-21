<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link href="./css/user.css" rel="stylesheet">
</head>
<body>
    <?php
    include 'navbar.php';
    $stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM report");
    $stmt->execute();
    $row = $stmt->fetch();

    $stmt2 = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reportevent");
    $stmt2->execute();
    $row2 = $stmt2->fetch();
    //var_dump($row);
    ?> 
    <!-- <a href="logout.php">Logout </a> -->
    <!-- <div class="title">
        <a href="./index.php">Home  </a><a href="./admin.php">>  Dashboard</a>
        <p></p>
    </div> -->
    <div class="sidenavbar">
        <div class="sidenav">
            <a href="index.php">Home</a>
            <a href="./admin.php">Dashboard</a>
            <a href="./googlemaps/data.php">Express Reports</a>
            <a href="./googlemaps/reportdata.php">Reported Event</a>
            <a href="mailto:sydneykanjie@students.uonbi.ac.ke">Check Email</a>
        </div>
    </div>
    <hr> 
    <div class="admincontent" >
    <div class="boxgrid">
            <article class="box"><a class="boxcontent" href="./googlemaps/data.php"><i class="fa fa-lightbulb-o fa-3x"></i>
                <h3 class="boxtitle"><?php echo $row['numrows']?></h3>
                <p>Number of Express reported cases</p><span class="boxmore">Click to see more<i class="fa fa-arrow-right"></i></span></a></article>
              

            <article class="box"><a class="boxcontent" href="./googlemaps/reportdata.php"><i class="fa fa-code fa-3x"></i>
                <h3 class="boxtitle"><?php echo $row2['numrows']?></h3>
                <p>Number of reported events</p><span class="boxmore">Click to see more<i class="fa fa-arrow-right"></i></span></a></article>
           
          </div>

    </div>
</body>
</html>