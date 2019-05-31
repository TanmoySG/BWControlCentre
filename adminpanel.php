<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<?php
include 'connection.php';
session_start();
if (isset($_SESSION['logged_in'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    $query = "SELECT * FROM administrators WHERE name ='$name'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $phone_no = $row['phone_no'];
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
                            <a href="index.php" style="float: left; font-family: 'Quicksand', sans-serif;  padding-left: 50px; color:#f6a821">BrainWave Control Center <sup style="font-size: 10px;">Beta</sup></a>
                        </span>
                    </center>
                </div>
            </div>
            <div class="content-section" style="padding-top: 65px;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="funtion-are-one">
                            <div style="padding: 75px;">
                                <center>
                                    <img src="BWLOGOF190519-2.png" style="width: 400px;">
                                    <div style="margin-top: 25px;">
                                        <h1 style="color: #f6a821; font-family: 'Quicksand', sans-serif; font-size: 50px"><?php echo $name ?></h1>
                                        <h2 style="color: #f6a821; font-family: 'Quicksand', sans-serif; font-size: 35px; margin-top: -15px;">Administrator</h2>
                                        <h2 style="color: #f6a821; font-family: 'Quicksand', sans-serif; font-size: 20px; margin-top: -15px;"><?php echo $phone_no ?> | <?php echo $email ?></h2>
                                        <br><br>
                                        <a href="logout.php" class="form-button-one" style="background-color: #f60847; border-color:#f60847; color: white; padding-right: 10px; font-size: 20px;">Logout</a>
                                        <a href="#"  style="font-family: 'Montserrat'; color: white; padding-left: 10px; font-size: 20px;">Edit Details</a>
                                    </div>
                                </center>  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="funtion-are-one">
                            <div style="padding: 40px;">
                                <span style="color: #f6a821; font-family: 'Quicksand', sans-serif; font-size: 60px"><i class="fas fa-tachometer-alt"></i> Dashboard<sup style="font-size: 30px; margin-top: -10px">Beta</sup></span><br>
                                <div class="row" style="padding-top:40px; padding-bottom: 40px; font-family: 'Quicksand', sans-serif;">
                                    <div class="col-lg-12" style="padding-top: 25px; padding-bottom: 20px;">
                                        <a href="http://bit.ly/Brainwave19" target="_blank" style="font-size: 40px; color: #f60847">
                                            <i class="fas fa-user-plus"></i> Team Registration
                                        </a> 
                                    </div>
                                    <br>
                                    <div class="col-lg-12"  style="padding-top: 20px; padding-bottom: 20px;">
                                        <a href="scorepanel.php" style="font-size: 40px; color: #1e78ff">
                                            <i class="fas fa-marker"></i>  Prelims Score Panel
                                        </a>  
                                    </div>
                                    <br>
                                    <div class="col-lg-12"  style="padding-top: 20px; padding-bottom: 20px;">
                                        <a href="scoreboard.php" style="font-size: 40px; color: #00ffb6">
                                            <i class="fas fa-clipboard"></i>  View Scores
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>

    <?php
} else {
    header('Location: login.php');
}
?>
