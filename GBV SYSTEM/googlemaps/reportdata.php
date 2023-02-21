<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REPORT EVENT</title>
    <link href="../css/reportdata.css" rel="stylesheet">
</head>
<body>
    <table id="countit" border = 1 cellspacing = 0 cellpadding = 10>
        <tr>
            <td class="count-me">ID</td>
            <td>Gender</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Phone Number</td>
            <td>Reported Crime</td>
            <td>Perpetrator</td>
            <td>Regularness</td>
            <td>Location</td>

</tr>
<?php
    require './conn.php';
    $rows = mysqli_query($conn, "SELECT * FROM reportevent ORDER BY id ASC");
    $i = 1;


    foreach($rows as $row) :

?>
    <tr>
        <td> <?php echo $i++ ?> </td>
        <td> <?php echo $row["gender"]; ?></td>
        <td> <?php echo $row["firstName"]; ?></td>
        <td> <?php echo $row["lastName"]; ?></td>
        <td> <?php echo $row["phoneNumber"]; ?></td>
        <td> <?php echo $row["crime"]; ?></td>
        <td> <?php echo $row["perpetrator"]; ?></td>
        <td> <?php echo $row["regularness"]; ?></td>
        <td> <a class="link" target="_blank" href="https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; 
        ?>&h1=es;z=14&output=embed' style = "width: 100%; height: 1000px;">See User Location</a> </td>

    </tr>
<?php endforeach; ?>

</table>

</body>
</html>