
<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['admin_name']);
    $email = mysqli_real_escape_string($db, $_POST['admin_email']);
    $phone = mysqli_real_escape_string($db, $_POST['admin_phone_no']);
    $password = mysqli_real_escape_string($db, $_POST['admin_password']);
    $password = md5($password);
    $register_query = "INSERT INTO `administrators`(`name`, `email`, `phone_no`, `password`) VALUES ('$name', '$email','$phone','$password')";
    mysqli_query($db, $register_query);

    $message = "Successfull!";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BrainWave Control Center</title>
        <link rel="stylesheet" type="text/css" href="styling/forms.css">
        <link rel="icon" href="favicon.ico" sizes="20x20" type="image/png">  
        <link rel="stylesheet" type="text/css" href="styling/dashboard.css">
        <link rel="stylesheet" type="text/css" href="styling/flexboxgrid.css">
        <link rel="stylesheet" type="text/css" href="styling/typography.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.typekit.net/sgr8dvc.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans:300|Oswald|Raleway|Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
    </head>
    <body style="background-color: #464646; ">
        <div class="dashboard-navbar-dark">
            <div class="dashboard-navbar-options-dark nav-title" style="width: 100% ;">
                <center>
                    <span>
                        <a href="index.php" style="float: left; font-family: 'Quicksand', sans-serif;  padding-left: 50px; color:#f6a821">BrainWave Control Center</a>
                    </span>
                </center>
            </div>
        </div>
        <div style="padding-top: 20px">
            <div class="col-lg-offset-4 col-lg-4 box" style="vertical-align: middle; padding: 35px; background-color: #242424;">
                <form action = "register.php" method = "POST" style="color: #d1d1d1; "> 
                    <h1 style="font-size: 50px; font-family: bebas-neue ; ">ADMINISTRATOR SIGN-UP</h1>
                    <?php if (isset($message)) { ?>
                        <small style="font-size: 15px; font-family: 'Montserrat'; color:#00ffb6;"><?php echo $message; ?></small>
                    <?php } ?>
                    <div class="row form-input-group">
                        <label style="float: left">Administrator</label>
                        <select name="admin_name" class="input-box col-lg-12" style="background-color: transparent; color: white">
                            <option value="Tanmoy Sen Gupta">Tanmoy Sen Gupta</option>
                            <option value="Sayan Roy">Sayan Roy</option>
                            <option value="Vinayak Ganguly">Vinayak Ganguly</option>
                        </select>
                    </div>
                    <div class="row form-input-group">
                        <label style="text-align: left">Email</label><br><br>
                        <input placeholder="Email" type = "text" name = "admin_email" class="input-box col-lg-12" autocomplete="off" style="background-color: transparent; color: white">
                    </div>
                    <div class="row form-input-group">
                        <label style="text-align: left">Phone Number</label><br><br>
                        <input placeholder="Phone" type = "text" name = "admin_phone_no"  class="input-box col-lg-12" autocomplete="off" style="background-color: transparent; color: white">
                    </div>
                    <div class="row form-input-group">
                        <label style="text-align: left">Password</label><br><br>
                        <input placeholder="Password" type = "password" name = "admin_password"  class="input-box col-lg-12" autocomplete="off" style="background-color: transparent; color: white">
                    </div>
                    <br>  
                    <div class="row form-input-group">
                        <button type="submit" name="submit" class="form-button-one col-lg-12" style="background-color: #8001ff; border-color:#8001ff; color: white">Sign-Up</button>
                    </div>
                </form>  
            </div>
        </div>
    </body>
</html>
