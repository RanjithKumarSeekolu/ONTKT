<?php
$user = $_POST['user'];
$password = $_POST['password'];
$error = "";
$con = new mysqli('localhost','root','','userregistraion');
session_start();
if($con->connect_error)
{
    die('Connection failed : '.$con->connect_error);
}
else
{
    $stmt = $con->prepare("select * from registration where user = ?");
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0)
    {
      $data =$stmt_result->fetch_assoc();
      if($data['password'] === $password)
      {
          #echo "<h2>Login Successful</h2>";
          $_SESSION['name']=$user;
          header('location:MainRoutes.php);
      }else
      {
         header('location:OnTkt.php?error=Invalid Username or password');
      }
    }else
    {
        $error = "Invalid Username or Password!";
    }
}

?>