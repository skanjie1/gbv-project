<?php

require './conn.php';

if(isset($_POST["report"])){
    $gender = $_POST["gender"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $crime = $_POST["crime"];
    $perpetrator = $_POST["perpetrator"];
    $regularness = $_POST["regularness"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO reportevent VALUES (NULL, '$gender', '$firstName', '$lastName', '$phoneNumber', '$crime', '$perpetrator', '$regularness', '$latitude', '$longitude')";
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
    <title>REPORT EVENT</title>
    <link href="../css/report.css" rel="stylesheet">
</head>

<body onload = "getLocation();">
    <div class="title">
        <h1 class="crimereport">GBV CRIME REPORT</h1>
        <p class="toreport">To report please provide the following details</p>
    </div>
    <hr>
    <div class="report"> 
        <form action="" method="POST" class="form"> 

                <p class="description">Victim Details:</p>
                <div class="inputfield">
                    <label>Mr./Mrs./Ms.</label>
                    <div>
                        <select name="gender">
                            <option value="">Select</option>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Ms">Ms.</option>
                        </select>
                    </div>
                    <label>First Name</label>
                    <input type="text" class="input" name="firstName" placeholder="First Name">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lastName" placeholder="Last Name">
                </div>
                <div class="inputfield">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phoneNumber" placeholder="Phone Number">
                </div>

                <p class="description">Crime Information:</p>
                <div class="inputfield">
                    <label>Type of Crime</label>
                    <div class="custom_select">
                        <select name="crime">
                            <option value="">Select</option>
                            <option value="Rape">Rape</option>
                            <option value="Sexual Assault">Sexual Assault</option>
                            <option value="Physical Abuse">Physical Abuse</option>
                            <option value="FGM">Female Genital Mutalation (FGM)</option>
                            <option value="Forced Marriage">Forced Marriage</option>
                            <option value="Denial of resources">Denial of Resources</option>
                        </select>
                    </div>
                </div>
                    
                    <div class="inputfield"> 
                        <label>Relationship with perpetrator:</label>
                       <div class="custom_select">
                           <select name="perpetrator"> 
                               <option value="">Select</option>
                               <option value="Family">Family</option>
                               <option value="Relative">Relative</option>
                               <option value="Neighbour">Neighbour</option>
                               <option value="Friend">Friend</option>
                               <option value="Stranger">Stranger</option>
                           </select>
                       </div>
                   </div>

                <div class="inputfield">
                    <label>Regularness of Crime</label>
                    <div  class="custom_select">
                        <select name="regularness">
                            <option value="">Select</option>
                            <option value="First">First Occurence</option>
                            <option value="Regular">Regular Occurence</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" class="input" name="latitude" value="">
                <input type="hidden" class="input" name="longitude" value="">

               <!-- <div class="inputfield"> 
                   <input type="checkbox" class="correct" id="correct">
                   <label for="correct">I agree everything detailed in this form is eligbly correct</label>
               </div>       -->
               <div class="inputBtn">
                <button type="submit" name="report" class="btn">Submit</button>
                <input type="submit" value="Clear" class="btn">
            </div>

        </form>
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