<?php include('constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="form.css">
    <title>d_form</title>
</head>
<body>
 
    <div class="container">
        <form action="" method="POST">
          <h1><b>FILL THE INFORMATIONS</b></h1>
          <div class="row">
            <div class="col-25">
              <label for="fname" style="color: rgb(0, 0, 0);" >Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="Name" placeholder="Your name.." required>
            </div>
          </div>
         
          <div class="row">
            <div class="col-25">
              <label for="fname" style="color: rgb(0, 0, 0);" >Phone Number</label>
            </div>
            <div class="col-75">
              <input type="text" id="fname" name="Phone_Number" placeholder="Your phone no.." required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname" style="color: rgb(0, 0, 0);" >Address</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="Adress" placeholder="Your Address.." required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="country" style="color: rgb(0, 0, 0);" >Country</label>
            </div>
            <div class="col-75">
              <select id="country" name="country" required>
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname" style="color: rgb(0, 0, 0);" >City</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="City" placeholder="Your city.." required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname" style="color: rgb(0, 0, 0);" >State</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="State" placeholder="Your state.." required>
            </div>
          </div>



          <div class="row">
            <div class="col-25">
              <label for="lname" style="color: rgb(0, 0, 0);">Pincode</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="Pincode" placeholder="Your pincode.." required>
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="subject" style="color: rgb(0, 0, 0);" >Subject</label>
            </div>

            <div class="col-75">
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>

          </div>


    

        <div class="collap_choose">
            <p class="pp" style="font-weight: bold ;color: rgb(0, 0, 0);" >Choose the facilities</p>

            <button type="button" class="j" data-toggle="collapse" data-target="#demo">Simple collapsible</button>

            <div id="demo" class="collapse">
                <br>
                <div class="choose">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="s_checkbox" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1" style="color: rgb(0, 0, 0);" >wheelchair</label>
                  </div>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="s_checkbox" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1" style="color: rgb(0, 0, 0);" >walking stick</label>
                  </div>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="s_checkbox" id="customCheck1">
                    <label class="custom-control-label" style="color: rgb(0, 0, 0);" for="customCheck1">AI talking Robot</label>
                  </div>

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="s_checkbox" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1" style="color: rgb(0, 0, 0);" >personal assistant and support</label>
                  </div>

                  <details><summary style="font-weight: bolder;color: rgb(0, 0, 0);font-size: large;"><b>Other Availabilities</b></summary>
                    <div class="row">
                    <div class="col-25">
                      <label for="lname">Other details</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="lname" name="o_details" placeholder="Fill Here">
                    </div>
                  </div></details>

                  <div class="submit-bt">
                    <input type="submit" value="Submit" name="submit" >
                  </div>
                  
                </div>
            </div>
          </div>
    </form>

     
</body>
</html>

<?php

if(isset($_POST['submit']))
{
  $Name = $_POST['Name'];
  $Phone_Number = $_POST['Phone_Number'];
  $Address = $_POST['Address'];
  $Country = $_POST['Country'];
  $City = $_POST['City'];
  $State = $_POST['State'];
  $Pincode = $_POST['Pincode'];
  $Subject = $_POST['Subject'];
  $s_checkbox = $_POST['s_checkbox'];
  $o_details = $_POST['o_details'];

    $sql = "INSERT INTO f_form SET
    Name = '$Name',
    Phone_Number = '$Phone_Number',
    Address = '$Address',
    Country = '$Country',
    City = '$City',
    State = '$State',
    Pincode = '$Pincode',
    Subject = '$Subject',
    s_checkbox = '$s_checkox',
    o_details = '$o_details'
    ";

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

}
?>