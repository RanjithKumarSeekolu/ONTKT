<?php
session_start();
$name = $_SESSION["name"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Booking history</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
    </head>
    <body>
        <div>
            <a href="http://localhost/project/MainRoutes.php" style="position:fixed;top:3%; margin-left:2%;"><button style="padding:5px 15px;border-radius:4px;">Back</button></a>
             <h1 style="text-align:center ; top:0%">Booking history</h1>
        </div>
        <br>
        <table class="table" style="margin-right:20%;margin-left:8%;">
        <thead>
            <tr>
                <th>Ticket Id</th>
                <th>Ticket Amount</th>
                <th>Reference Id</th>
                <th>Transaction Status</th>
                <th>Payment mode</th>
                <th>Transaction time</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $con = new mysqli('localhost','root','','userregistraion');
                if($con->connect_error)
                {
                    die('Connection failed : '.$con->connect_error);
                }
                $sql = "select * from bookings where user='$name' order by txTime asc";
                $result = $con->query($sql);
                
                if(!$result)
                {
                    die("Invalid query: " . $con->error);
                }
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>
                        <td>" .$row['orderId'] ."</td>
                        <td>" .$row['orderAmount'] ."</td>
                        <td>" .$row['referenceId'] ."</td>
                        <td>" .$row['txStatus'] ."</td>
                        <td>" .$row['paymentMode'] ."</td>
                        <td>" .$row['txTime'] ."</td>
                        </tr>";
                }
            ?>
        </tbody>
        </table>
    </body>
</html>