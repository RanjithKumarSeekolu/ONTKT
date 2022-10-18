<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/routestyle.css">
    <script src="js/jsFile.js"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body style="background-image: url('./images/bg.jpg'); background-attachment: fixed; background-repeat: no-repeat; background-size: 100% 100%">
       <img src="./images/logo2.png" style="width:15%; position: absolute; top: 0%">
    <div style="margin-left:83%;">
  <!-- <p style="position: absolute; margin-left: 85%; top:0%; color: black; font-size:20px;"></p> -->
    <?php
      //  if($_SESSION["name"]){
    ?>
        <p>Welcome <?php //echo $_SESSION["name"]; ?>&nbsp;&#124;&nbsp;<a href="logout.php"style="text-decoration:none;">Logout</a></p>
    <?php
        //}else echo "<p>please login first</p>"
        ?>
        
    <a href="bookin.php" style=" margin-right:10%; top:9%; text-decoration: none;">
        <button class="button" style="padding:5px 15px; top:5%;" >Booking History</button></a>
      <!--  <a href="http://localhost/project/OnTkt.php" style="position: absolute; ; top:12%; text-decoration: none;"><button class="button">Logout</button></a> -->
        
    </div>
    <form  action="./checkout/start.php" id="form" method="post" name='myform' class = "form">
        <h1 class="route" style="margin-left: 38%;">Select Route</h1>
        <select id="mySelect" onchange="myFunction()">
            <option value="" selected disabled>select</option>
            <option value="Kadapa-Pulivendula">Kadapa-Pulivendula</option>
            <option value="Kadapa-Rayachoty">Kadapa-Rayachoty</option>
            <option value="Kadapa-Kurnool">Kadapa-Kurnool</option>
        </select>
        <div class="options">
        From:
        <select name="" id="mySelect2">

        </select>
        <img src="./images/arrow.svg" class="image" />
        To:
        <select name="" id="mySelect3" >

        </select>
        </div>
        <div class="customer">
        <p>Select Number Of Passengers</p>
        <label>Adults</label>
        <input type="number" name="adults" value='0' id="adults" min='0' max='10'>
        <label>Children</label>
        <input type="number" name="children" value='0' id="children" min='0' max='10'>
        </div>
        <input type="hidden" id="TotalCost" name="TotalCost" value="0">
        <input class="btn"  style="margin-left: 10%" type="submit" value="offline"  onclick="getSourceDest();myform.action='offline.php'; myform.method='post'; return true;" />
        <input type="submit" class="btn"  style="margin-left: 40%;" onclick="getSourceDest()" value="online"/>
	   <p id="demo"></p>
    </form>
    
</body>
</html>
