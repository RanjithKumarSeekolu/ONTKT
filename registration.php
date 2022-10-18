<?php
echo 'Registration Succcessful, Please wait.. you will be redirected to home page';
header('refresh:3; url=OnTkt.php');
 
$phone = $_POST['phone'];
$user = $_POST['user'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','userregistraion');
if($conn->connect_error)
{
    die('Connection failed : '.$conn->connect_error);
}
else
{
        $stmt = $conn->prepare("insert into registration(phone,user,password)
        values(?,?,?)");
        $stmt->bind_param("sss",$phone,$user,$password);
        $stmt->execute();
        #$echo 'registration success';

        $stmt->close();
        $conn->close();
}

?>