<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket Bookings </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 align="center">Ticket Booking Details</h1>	

	<?php  
		 $secretkey = "4810e1a8b7bb21169e10561fe16677299a9384b6";
		 $orderId = $_POST["orderId"];
		 $orderAmount = $_POST["orderAmount"];
		 $referenceId = $_POST["referenceId"];
		 $txStatus = $_POST["txStatus"];
		 $paymentMode = $_POST["paymentMode"];
		 $txMsg = $_POST["txMsg"];
		 $txTime = $_POST["txTime"];
		 $signature = $_POST["signature"];
		 $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
		 $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
		 $computedSignature = base64_encode($hash_hmac);
        $conn = new mysqli('localhost','root','','userregistraion');
        if($conn->connect_error)
        {
            die('Connection failed : '.$conn->connect_error);
        }
        else
        {
            $user=substr($orderId,8,strlen($orderId)-1);
            $orderId=substr($orderId,0,8);
            $stmt = $conn->prepare("insert into bookings(user,orderId,orderAmount,referenceId,txStatus,paymentMode,txTime)
            values(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss",$user,$orderId,$orderAmount,$referenceId,$txStatus,$paymentMode,$txTime);
            $stmt->execute();

            $stmt->close();
            $conn->close();
        }
		 if ($signature == $computedSignature) {
	 ?>
	<div class="container"> 
	<div class="panel panel-success">
	  <!-- <div class="panel-heading">Transaction Successful</div> -->
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Ticket ID <?php echo substr($orderId,8,strlen($orderId)-1);?></td>
			        <td><?php echo substr($orderId,0,7); ?></td>
			      </tr>
			      <tr>
			        <td>Ticket Amount</td>
			        <td><?php echo $orderAmount;?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
          
		<!-- </div> -->

	   </div>
        <button onclick="window.print()" style="margin-left:40%;">Print Ticket</button>
	</div>
    <?
    <?php
    if($txStatus == "FAILED")
    {
        echo "<div> <p style='color:red;'>Booking Unsuccessful, click back to try again!</p> 
        <a href= 'http://localhost/project/MainRoutes.php?id=$user'><button style='padding:5px 20px; border-radius:5px'>Back</button></a> </div>";
    }if($txStatus == "SUCCESS")
    {
      echo "<div> <p style='color:green;'>Booking successful, click back to book another</p> 
        <a href= 'http://localhost/project/MainRoutes.php'><button style='padding:5px 20px; border-radius:5px'>Back</button></a> </div>";
    }
    ?>
	</div>
	 <?php   
	  	} else {
	 
	 ?>
	<div class="container"> 
	<div class="panel panel-danger">
	  <div class="panel-heading">Signature Verification failed</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Ticket ID</td>
			        <td><?php echo $orderId; ?></td>
			      </tr>
			      <tr>
			        <td>Ticket Amount</td>
			        <td><?php echo $orderAmount; ?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
		<!-- </div> -->
	  </div>	
	</div>
        <div> <p style="color:red;">Booking Unsuccessful, click back to try again!</p> <a href="http://localhost/project/MainRoutes.php"><button style="padding:5px 20px; border-radius:5px">Back</button></a></div>
	</div>
	<?php	
	 	}
	 ?>

</body>
</html>



