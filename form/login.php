<?php include('constant.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>login</title> 
   
</head>
<body>
    <h1>login</h1>
    <form action = "#" method="POST">
    <label for="username"><b>username</b></label></b><br><br>
   <input type="text" placeholder="Enter username" name="username" required><br><br>

   <lable for="password"><b>password</b></label></b><br><br>
   <input type="password" placeholder="Enter password" name="password" required><br><br>

   <button type="submit" name="submit" >login</button><br><br>
   <a href="#">forget password</a><br><br>

   <input type="submit" value="sign up"> <br><br> 
</form>
</body>
</html>
<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);

    $raw_password = ($_POST['password']);
    $password = mysqli_real_escape_string($conn,$raw_password);

    //2. sql to check whether the user with username and password exists or not
    $sql = "SELECT * FROM data WHERE username='$username' AND password='$password'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    //4. count rows to check whether the user exixts or not 
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        //user available and login success
        $_SESSION['login'] = "<div class='success'>login successful.</div>";
        $_SESSION['user'] = $username;//to check whether the user is logged in or not and logout will unset in

        //redirect to home page/dashboard
      header('location:'.SITEURL.'display.php');
    }
    else{
        //user not available and login fail
        $_SESSION['login'] = "<div class='error text-center'>username or password did not match.</div>";
        //redirect to home page/dashboard
        header('location:'.SITEURL.'login.php');
    }
}
?>