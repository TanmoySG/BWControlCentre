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

    if (isset($_POST['submit'])) {

        $reg_c = mysqli_real_escape_string($db, $_POST['reg_c']);
        $score = mysqli_real_escape_string($db, $_POST['prelim_score']);
        $reg_c = "BW" . $reg_c;
        if ($score <= 25) {
            $score_query = "INSERT INTO `prelim_point`(`team_code`, `points`) VALUES ('$reg_c','$score')";
            mysqli_query($db, $score_query);

            $message = "Successfull!";
        } else {
            $error = "Score cannot be more than 25";
        }
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
                            <a href="index.php" style="float: left; font-family: 'Quicksand', sans-serif;  padding-left: 50px; color:#f6a821">BrainWave Control Center <sup style="font-size: 10px;">Beta</sup></a>
                        </span>
                        <span style="float: right;">
                            <a href="adminpanel.php" style="color:#f6a821"><i class="fas fa-home"></i></a>  
                            <a href="logout.php" style="color:#f6a821"><i class="fas fa-sign-out-alt" ></i></a>  
                        </span> 
                    </center>
                </div>
            </div>
            <?php if (isset($message)) { ?>
                <div class="content-section" style="padding-top: 10px;  font-family: 'Quicksand'">
                    <div class="row">
                        <div class="col-lg-offset-4 col-lg-4">
                            <div class="funtion-are-one" style="padding: 40px">
                                <span style="color: #00ffb6; font-size: 30px;">Successful!</span>
                                <div class="row" style="width: 100%;">
                                    <div style="float: left; width: 50%">
                                        <span style="font-size: 15px; color: #d1d1d1;">Team Code</span><br>
                                        <span style="font-size: 35px; color: #00ffb6;"><?php echo $reg_c; ?></span>
                                    </div>
                                    <div style="float: left; width: 50%">
                                        <span style="font-size: 15px; color: #d1d1d1;">Score</span><br>
                                        <span style="font-size: 35px; color: #00ffb6;"><?php echo $score; ?></span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="content-section" style="padding-top: 10px;">
                <div class="row">
                    <div class="col-lg-offset-4 col-lg-4">
                        <div class="funtion-are-one" style="padding: 60px">
                            <form action = "scorepanel.php" method = "POST" style="color: #d1d1d1; "> 
                                <h1 style="font-size: 50px; font-family: bebas-neue ; ">Score Panel</h1>
                                <?php if (isset($error)) { ?>
                                <small style="font-size: 15px; font-family: 'Montserrat'; color: #ff1b1b; margin: 0px;"><?php echo $error; ?></small>
                                <?php } ?>
                                <div style="margin-top: -10px">
                                    <div class="row form-input-group">
                                        <label style="text-align: left">Team Code</label><p style="font-size: 12px; margin-top: 0px;"><i>(Do not add BW prefix to the Team Code)</i></p>
                                        <input placeholder="BWXXX" type = "text" name = "reg_c" class="input-box col-lg-12" autocomplete="off" style="background-color: transparent; color: white; border-color: #8001ff; border-width: 2px">
                                    </div>
                                    <div class="row form-input-group">
                                        <label style="text-align: left">Preliminary Round Score </label><p style="font-size: 12px; margin-top: 0px;"><i>(Maximum Score: 25)</i></p>
                                        <input placeholder="Score" type = "text" name = "prelim_score"  class="input-box col-lg-12" autocomplete="off" style="background-color: transparent; color: white; border-color: #8001ff; border-width: 2px">
                                    </div>
                                    <br>     
                                    <div class="row form-input-group">
                                        <button type="submit" name="submit" class="form-button-one col-lg-12" style="background-color: #8001ff; border-color:#8001ff; color: white">Submit Score</button>
                                    </div>  
                                </div>
                            </form>  
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
