<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOCATION</title>
</head>
<body>

<?php
    require './googlemaps/conn.php';
    $rows = mysqli_query($conn, "SELECT latitude, longitude FROM reportevent ORDER BY id ASC");
    

    foreach($rows as $row) :

?>
    <tr>
        <td> <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&h1=es;z=14&output=embed' style = "width: 100%; height: 1000px;"></iframe> </td>

    </tr>
<?php endforeach; ?>

</body>
</html>