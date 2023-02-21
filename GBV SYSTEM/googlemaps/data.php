<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPRESS REPORT</title>
    <link href="../css/data.css" rel="stylesheet">

    
	<script src =
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
	</script>
</head>
<body>
    <table id="countit" border = 1 cellspacing = 0 cellpadding = 10>
        <tr>
            <td>ID</td>
            <td>Gender</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Phone Number</td>
            <td>Location</td>

</tr>
<?php
    require '../googlemaps/conn.php';
    $rows = mysqli_query($conn, "SELECT * FROM report ORDER BY id ASC");
    $i = 1;


    foreach($rows as $row) :

?>
    <tr>
        <td> <?php echo $i++ ?> </td>
        <td> <?php echo $row["gender"]; ?></td>
        <td> <?php echo $row["firstName"]; ?></td>
        <td> <?php echo $row["lastName"]; ?></td>
        <td> <?php echo $row["phoneNumber"]; ?></td>
        <td> <a class="link" target="_blank" href="https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; 
        ?>&h1=es;z=14&output=embed' style = "width: 100%; height: 1000px;">See User Location</a> </td>

    </tr>
<?php endforeach; ?>

</table>
<script>
        // $(document).ready(function(){
        //     var colCount = $("#countit tr").length;
        //     alert(colCount); 
        //   });
      </script> 
</body>
</html>