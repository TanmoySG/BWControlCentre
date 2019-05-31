<!DOCTYPE html>
<!--
Project by Tanmoy Sen Gupta | tanmoysps@gmail.com | www.tanmoysg.com
-->
<?php
include 'connection.php';
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
                        <a href="index.php" style="color:#f6a821"><i class="fas fa-home"></i></a> 
                    </span> 
                </center>
            </div>
        </div>
        <div class="content-section" style="padding-top: 10px;  font-family: bebas-neue">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="funtion-are-one" style="padding: 40px">
                        <span style="width: 100%;">
                            <span style="color: #d1d1d1; font-size: 50px; float: left;">Scores</span>
                            <span style="float: right;">
                                <a href="generate_score_report.php" target="_blank" style="color:#f6a821;font-size: 20px; font-family: 'Quicksand'">Generate Report</a> 
                            </span> 
                        </span>

                        <div class="row" style="width: 100%;">
                            <span style="width: 50%; font-size: 30px; color:#00ffb6 ">Team Code</span>
                            <span style="width: 50%; font-size: 30px; color: #00ffb6">Score</span>
                        </div>
                        <?php
                        $query_1 = "SELECT * FROM prelim_point ORDER BY points DESC";

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
            </div>
        </div>
    </body>
</html>