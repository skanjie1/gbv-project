<?php

require '../googlemaps/conn.php';

if(isset($_POST["report"])){
    $gender = $_POST["gender"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO report VALUES (NULL, '$gender', '$firstName', '$lastName', '$phoneNumber', '$latitude', '$longitude')";
    mysqli_query($conn, $query);

    echo 
    "
    <script>
        document.location.href = '../message.php';
        </script>
        
        "
        ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPRESS REPORT</title>
    <link href="../css/sosreport.css" rel="stylesheet">
</head>
<body onload= "getLocation();" > 
    <div class="container"> 
        <div class="title">
            <h1 class="crimereport">GBV CRIME REPORT</h1>
            <p class="toreport">Please input the following details</p>
        </div>
        <hr>
        <div class="report">

            <form action="" method="POST" class="form" autocomplete="off"> 
                <div class="inputfield">
                    <label>Mr./Mrs./Ms.</label>
                    <div class="custom_select">
                        <select name="gender">
                            <option value="">Select</option>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Ms">Ms.</option>
                        </select>
                    </div>
                    <label>First Name</label>
                    <input type="text" class="input" name="firstName" placeholder="First Name" >
                    <label>Last Name</label>
                    <input type="text" class="input" name="lastName" placeholder="Last Name" >
                </div>
                <div class="inputfield">
                    <label>Phone Number:</label>
                    <input type="text" class="input" name="phoneNumber" placeholder="Phone Number">
                </div>
               
                
                    <input type="hidden" class="input" name="latitude" value="">
                    <input type="hidden" class="input" name="longitude" value="">

              
                <div class="inputBtn">
                      <div class="elementpopup"> 
                      <button type="submit" class="btn" name="report">Submit</button>
                       <!-- <a href="submitbtn">Submit</a> -->
                       <input type="submit" value="Clear" class="btn">
                    </div>
                   </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript"> 

        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }
        }

        function showPosition(position){
            document.querySelector('.form input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.form input[name = "longitude"]').value = position.coords.longitude;
            
        }
        function showError(error){
            function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation");
                location.reload();
                break;
                case error.POSITION_UNAVAILABLE:
                alert( "Location information is unavailable.");
                location.reload();
                break;
                case error.TIMEOUT:
                alert("The request to get user location timed out.");
                location.reload();
                break;
                case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                location.reload();
                break;
             }
            }
        }

    </script>
</body>