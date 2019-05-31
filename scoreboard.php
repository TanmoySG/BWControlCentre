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

    $query_count = "SELECT * FROM prelim_point";
    $result = mysqli_query($db, $query_count);
    $pr_count = mysqli_num_rows($result);
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
                        <span style="float: right;">
                            <a href="adminpanel.php" style="color:#f6a821"><i class="fas fa-home"></i></a>  
                            <a href="logout.php" style="color:#f6a821"><i class="fas fa-sign-out-alt" ></i></a>  
                        </span> 
                    </center>
                </div>
            </div>
            <div class="content-section" style="padding-top: 10px;  font-family: bebas-neue">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="funtion-are-one" style="padding: 40px">
                            <span style="color: #d1d1d1; font-size: 50px;">Top 6 Teams</span>
                            <div class="row" style="width: 100%;">
                                <span style="width: 50%; font-size: 30px; color:#00ffb6 ">Team Code</span>
                                <span style="width: 50%; font-size: 30px; color: #00ffb6">Score</span>
                            </div>
                            <?php
                            $query_1 = "SELECT * FROM prelim_point ORDER BY points DESC LIMIT 6 ; ";

                            $result_1 = mysqli_query($db, $query_1);
                            while ($row = mysqli_fetch_assoc($result_1)) {
                                $rows[] = $row;
                            }
                            foreach ($rows as $row) {
                                ?>
                                <div class="row" style="font-family: 'Quicksand'">
                                    <span style="width: 50%; font-size: 30px; color:#d1d1d1 "><?php echo $row['team_code']; ?></span>
                                    <span style="width: 50%; font-size: 30px; color:#d1d1d1 "><?php echo $row['points']; ?></span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="funtion-are-one" style="padding: 40px">
                            <span style="color: #d1d1d1; font-size: 50px;">Score Board - Common</span>
                            <div class="row" style="width: 100%;">
                                <span style="width: 50%; font-size: 30px; color:#00ffb6 ">Team Code</span>
                                <span style="width: 50%; font-size: 30px; color: #00ffb6">Score</span>
                            </div>
                            <?php
                            $query_2 = "SELECT * FROM prelim_point ORDER BY points DESC ";

                            $result_2 = mysqli_query($db, $query_2);
                            while ($row = mysqli_fetch_assoc($result_2)) {
                                $rows[] = $row;
                            }
                            foreach ($rows as $row) {
                                ?>
                                <div class="row" style="font-family: 'Quicksand'">
                                    <span style="width: 50%; font-size: 30px; color:#d1d1d1 "><?php echo $row['team_code']; ?></span>
                                    <span style="width: 50%; font-size: 30px; color:#d1d1d1 "><?php echo $row['points']; ?></span>
                                </div>
                                <?php
                            }
                            ?>
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

/*<div class="funtion-are-one" style="padding: 40px">
                            <span style="color: #d1d1d1; font-size: 40px; ">Participants</span><br>
                            <div style="float: left;">
                                <span style="font-size: 25px; color: #d1d1d1;">Total Teams</span><br>
                                <span style="font-size: 35px; color: #00ffb6;"><?php echo $pr_count ?></span>
                            </div>
                            <div style="float: left; width: 50%">
                            </div>
                        </div>*/
?>