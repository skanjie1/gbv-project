<?php include 'session.php'; ?>

<?php

if (isset($_SESSION['admin'])) {
    header('location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link href='./css/login.css' type='text/css' rel='stylesheet'>
</head>
<body>
    <div class="title">
        <h1 class="loginheader">LOG IN</h1>
        <p class="description">GBVIM log in form. Explore, share, listen.</p>
    </div>
    <div class="login">
    
        <form action="verify.php" method="POST" class="form">
            <div class="inputfield">
                <label>User Name</label>
                <input type="text" class="input" name="firstName" placeholder="Username">
            </div>

            <div class="inputfield">
                <label>Password</label>
                <input type="password" class="input" name="password" placeholder="Enter password">
            </div>

            <div class="inputBtn">
                <button type="submit" class="btn" name="submit">Submit</button>
                <input type="submit" value="Clear" class="btn">
            </div>

            <!-- <div class="member">
              <p1>Not a member?</p1>
              <a class ="signin" href="signupform.php">SIGN IN</a>
            </div>  -->
        </form>
   
    </div>
</body>
</html>