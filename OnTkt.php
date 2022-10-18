<?php
    session_start();
    $message="";
    if(count($_POST)>0)
    {
        $con = mysqli_connect('localhost','root','','userregistraion') or die('unable to connect');
        $result = mysqli_query($con,"select * from registration where user='" .$_POST['user']. "' and password = '". $_POST['password']."'");
        $row = mysqli_fetch_array($result);
        if(is_array($row))
        {
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['user'];
        }
        else
        {
            $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"]))
    {
        header("location:MainRoutes.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="styles.css" />
    <title>OnTkt</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
  </head>
  <body>
    <div class="container">
    <img src="./images/logo2.png" style="width:15%; position:absolute; top:0%; right:3%;">
      <div class="forms-container">
        <div class="signin-signup">
          <form  class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <?php if(isset($_GET['message'])){?>
              <p class="error"><?php echo $message; ?></p>
            <?php }?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="user" required/>
              
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="pwd2" class="pwd" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" required/>
            </div>
              <div style="left:26%; top:76%;position:absoulte;">
                  <input type="checkbox" id='checkbox' onclick='showPassword()' /><label style="font-size:15px;"> show password</label>
              </div>
             <!-- <p id="validate"></p>-->
            <input type="submit" value="Login" class="btn solid" />
            
          </form>
          <form action="registration.php" class="sign-up-form" method="post">
            <h2 class="title">Register</h2>
              <div class="input-field" id="Phone Number">
              <i class="fas fa-phone"></i>
              <input type="text" placeholder="Phone Number" name="phone" pattern="^[0-9]{10}$" minlength="10" maxlength="10" required>
            </div>
              
            <div class="input-field" id="username">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="user" required>
            </div>
            
            <div class="input-field" id="password">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="pwd2" class="pwd" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required>
            </div>
              <div style="left:26%; top:76%;position:absoulte;">
                  <input type="checkbox" id='checkbox' onclick='showPassword()' /><label style="font-size:15px;"> show password</label>
              </div>
            <input onlick="register()" type="submit" class="btn" value="Register" /><br>
              <div style="font-size:13px;">
              Password should contain
              <ul>
                  <li>Should contain atleast one Capital Letter</li>
                  <li>Password length should be >=8</li>
                  <li>Should contain a digit & Special Character</li>
              </ul>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
      <img src="./images/logo2.png" style="width:15%; position:absolute; top:0%; right:83%;">
        <div class="panel left-panel">
          <div class="content">
            <h3>New Registration?</h3>
            <p>
              The new registrations are available only for the Bus Conductors
              who not yet registered
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
          <img src="./images/download.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an Account?</h3>
          	</br>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="./images/bus_image.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script>
        function showPassword(){
            var pf = document.getElementsByClassName("pwd");
            for(let x of pf){
                if(x.type==="password"){
                    x.type="text";
                }
                else{
                    x.type="password";
                }
            }
        }
    </script>
    <script src="app.js"></script>
  </body>
</html>
