<?php
$TotalCost=$_POST['TotalCost'];
if($TotalCost <= 0)
{
    header("location:../MainRoutes.php");
}
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cashfree-PG TestForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/js/jsFile.js"></script>
  </head>
  <body>
    <br>
    <br>
    <div class="container fluid">
      <h1 align="center">Checkout</h1>
      <form id="redirectForm" method="post" action="request.php">
        <div class="form-group">
          <input class="form-control" type="hidden" name="appId" value="23530852d74cdc08117c00c009803532"/>
        </div>
        <div class="form-group">
         <!-- <label>Ticket ID:</label><br> -->
          <input class="form-control" name="orderId" type="text" value="<?php /*$a  = uniqid('TKT');*/$x='TXN'; $y=rand(10000,99999); echo $x.$y; ?>" readonly>
        </div>
        <div class="form-group">
          <label>Adults: </label><br>
          <input class="form-control" name="adults" value="<?php $adults=$_POST['adults']; echo $adults; ?>" readonly/>
        </div>
        <div class="form-group">
          <label>Children:</label><br>
          <input class="form-control" name="children" value="<?php $children=$_POST['children']; echo $children; ?>"  readonly/>
        </div>
        <div class="form-group">
          <label>Ticket Amount:</label><br>
          <input class="form-control" name="orderAmount" value="<?php $TotalCost=$_POST['TotalCost']; echo $TotalCost; ?>" readonly/>
        </div>
        <div class="form-group">
          <input class="form-control" name="orderCurrency" type="hidden" value="INR" />
        </div>
        <div class="form-group">
          <input class="form-control" name="orderNote" type="hidden" value=""/>
        </div>    
        <div class="form-group">
          <input class="form-control" name="customerName" type="hidden"  value="John Doe"/>
        </div>
        <div class="form-group">
          <input class="form-control" name="customerEmail" type="hidden" value="customer@gmail.com"/>
        </div>
        <div class="form-group">
          <input class="form-control" name="customerPhone" type="hidden" value="9080786543"/>
        </div>
        <div class="form-group">
          <input class="form-control" name="returnUrl" type="hidden" value="http://localhost/project/checkout/response.php"/>
        </div>        
        <div class="form-group">
          <input class="form-control" name="notifyUrl"  type="hidden" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)"/>
        </div>
        <button type="submit" class="btn btn-primary btn-block" value="Pay">Proceed</button>
        <br> 
        <br>
      </form>
    </div>
    <br>    
    <br>    
    <br>    
    <br>    
  </body>
</html>

