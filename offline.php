<?php
session_start();
$TotalCost=$_POST['TotalCost'];
if($TotalCost <= 0)
{
    header("location:./MainRoutes.php");
}
$name=$_SESSION["name"];
$referenceId = 'none';
$txStatus = 'SUCCESS';
$paymentMode = 'CASH';
date_default_timezone_set('Asia/Kolkata');
$txTime = date("Y-m-d h:i:sa",time());
$x='TXN';
$y=rand(10000,99999); 
$orderId=$x.$y;

$conn = new mysqli('localhost','root','','userregistraion');
if($conn->connect_error)
{
    die('Connection failed : '.$conn->connect_error);
}
else
{
    $stmt = $conn->prepare("insert into bookings(user,orderId,orderAmount,referenceId,txStatus,paymentMode,txTime)
            values(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss",$name,$orderId,$TotalCost,$referenceId,$txStatus,$paymentMode,$txTime);
    $stmt->execute();
    #$echo 'registration success';
   
    $stmt->close();
    $conn->close();
}
?>
<html>
    <head>
        <style>
            #ticket{
                font-family: cursive;
                width:80%;
                margin-left: 5%;
            }
            #ticket td, #ticket th{
                border: 1px solid #ddd;
                padding: 8px;
            }
        </style>
        <link rel="icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <h1 style="text-align:center;">Ticket Details</h1>
        <table id="ticket" style="border-collapse:collapse;">
            <tr>
                <td>Ticket Id</td>
                <td><?php echo $orderId; ?></td>
            </tr>
            <tr>
                <td>Ticket Amount</td>
                <td><?php echo $TotalCost; ?></td>
            </tr>
            <tr>
                <td>Transaction Status</td>
                <td><?php echo $txStatus; ?></td>
            </tr>
            <tr>
                <td>Payment mode</td>
                <td><?php echo $paymentMode; ?></td>
            </tr>
            <tr>
                <td>Transaction Time</td>
                <td><?php echo $txTime; ?></td>
            </tr>
        </table>
        <button onclick="window.print()" style="margin-left:40%;margin-top:3%;">Print Ticket</button>
        <div style="margin-left:5%">
        <p style="color:green">Ticket Booking successful, click back to book another ticket</p>
            <a href="http://localhost/project/MainRoutes.php" ><button style="backgroung-color:cyan ; padding:5px 15px;">Back</button></a>
        </div>
    </body>
</html>