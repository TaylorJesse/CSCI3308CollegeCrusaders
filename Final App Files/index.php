<?php
 session_start();
      error_reporting(E_ALL);

$servername = '????';
$username = '???';
$password = '???';
$dbname ='????';
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Could not connect to db!");
      
      if(isset($_POST['colleges'])){
        $majorArray= array();
        $_SESSION['colleges']= $_POST['colleges'];
        $colleges= $_POST['colleges'];
        $sql = "SELECT Major FROM ".$colleges." ORDER BY Major;";
        $res = $conn->query($sql);
        while($majors=mysqli_fetch_array($res)){
          array_push($majorArray, $majors[0]);
        }
      }
      if(isset($_POST['majors'])){
        $rankArray= array();
        $majors= $_POST['majors'];
        $sql = 'SELECT Ranking, EarlyPay, MidPay FROM '.$_SESSION['colleges'].' WHERE Major= "'.$majors.'";';
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
          // output data of each row
          while($row = $res->fetch_assoc()) {
            $Rank= $row["Ranking"];
            $EarlyPay= $row["EarlyPay"];
            $MidPay= $row["MidPay"];
          }
        }
        setlocale(LC_MONETARY, 'en_US');
        $EarlyPay= money_format('%(#1n',$EarlyPay);
        $MidPay= money_format('%(#1n',$MidPay);
        
      }
    ?>
<!DOCTYPE html>
<html>
    <link href="styles/main.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <head>
        <meta charset="utf-8">
        <title>College Crusaders</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">College Crusaders</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <ul class="nav navbar-nav">
                            <li><a href="debt.php">Debt Calculator <span class="sr-only">(current)</span></a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <!--
            <div class="desciption">
              <p>
                Welcome! This site is designed to help students eaisly learn about which college magors are in high demand. Simply choose a college, then select a major and hit Go!
              </p>
            </div>
            -->
        <center><img src="logo.png" style="width:300px;height:300px;"></center>
        <div class="container">
            <div class="row">
                <h3>
                    Welcome! This site is designed to help students easily learn about which college majors are in high demand.
                </h3>
                <h3 align="center">
                    Simply choose a college, then select a major and hit Go!
                </h3>
            </div>
            <div class="row">
                <div class="col-sm-4 pull-left">
                    <p>College</p>
                </div>
                <form action="http://ccrusaders.co.nf/" method='post'>
                    <div class="col-sm-4 pull-left">
                        <div class="dropdown">
                            <select aria-labelledby="dropdownMenu1" name="colleges"> <!-- Insert onchange="this.form.submit()" as option to submit on changing-->
                                <option value="Arts_and_Science" >Arts & Science</option>
                                <option value="Business">Business</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <input type='submit' value='Submit' class= "btn btn-primary" />
                    </div>
            </div>
            </form>
            <div class="row">
                <div class="col-sm-4 pull-left">
                    <p>Majors</p>
                </div>
                <form action="http://ccrusaders.co.nf/" method='post'>
                    <div class="col-sm-4">
                        <div class="dropdown max-width">
                            <select aria-labelledby="dropdownMenu1" name="majors">
                            <?php
                                if(isset($majorArray)){
                                  foreach($majorArray as &$major){
                                    echo '<option value="'.$major.'">'.$major.'</option>';
                                  }
                                }
                                  
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <input type='submit' value='Submit' class= "btn btn-primary" />
                    </div>
            </div>
        </div>
        </form>
        <h4 align= "center"> <?php
                if(isset($_POST['majors'])){
                        echo $_POST['majors'];} 
         ?> </h4>
        <div class = "container pull-center">
          <div class="row">
            <div class="col-sm-12">
                <table class="table width">
                    <thead>
                        <tr align="center">
                            <th class="text-center">Rank</th>
                            <th class="text-center">Early Pay</th>
                            <th class="text-center">Mid Pay</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr align= "center">
                            <td><?php
                            if(isset($Rank)){
                            echo $Rank;}
                            ?></td>
                            <td><?php 
                            if(isset($EarlyPay)){
                            echo $EarlyPay;}
                            ?></td>
                            <td><?php
                            if(isset($Rank)){
                            echo $MidPay;}
                            ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <script src="scripts/main.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    <?php $conn->close(); ?>
</html>
