<?php include('constant.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/sign.css" type="text/css">
    <title>sign up</title>
    
</head>
<body>
    
    <form action="#" method="POST">
    <div class="signup-form">
        
            <h1>SIGN UP</h1><br><br>
        
            <label for="username" class="username"><b>Username </b></label><br><br>
            <input type="text" placeholder="Enter username" name="username" required><br><br>

            <label for="email"><b>Email</b></label><br><br>
            <input type="text" placeholder="Enter email" name="email" required><br><br>

            <label for="password"><b>Password</b></label><br><br>
            <input type="password" placeholder="Enter password" name="password" required><br><br>
            
            <label for="cnfmpass"><b>Confirm Password</b></label><br><br> 
            <input type="password" placeholder="Confirm password" name="cnfmpass" required><br><br>

            <label>
                <input type="checkbox"  name="remember"> Show Password
            </label><br><br>

            <p>Already have account?<a href="login.php">login</a></p><br>

            <div class="clesrfix">
                <button type="submit" name="submit" >sign up</button><br>

            </div>
    </div>
    </form>
</body>
</html>


<?php

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cnfmpass = $_POST['cnfmpass'];

    $sql = "INSERT INTO data SET
    username = '$username',
    email = '$email',
    password = '$password',
    cnfmpass = '$cnfmpass'
    ";
    if($_POST['password'] !== $_POST['cnfmpass']) {
        die('password and confrim password should match');
    }
    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res ==TRUE)
    {
        $_SESSION['add'] = "<div class='success'>signup successfully</div>";
        header("location:".SITEURL.'login.php');
    }
    else{
        $_SESSION['add'] = "<div class='error'>failed to add</div>";
        header("location:".SITEURL.'signup.php');
    }
}
?>
