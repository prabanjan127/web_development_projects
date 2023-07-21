<?php include('constant.php');?>
<?php include('logincheck.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f_display.css">
    <title>Data-display</title>
</head>
<body>
    <h1>Information List</h1>
  
<table class="tbl-full">
                    <tr>
                        <th>S.No &nbsp;</th>
                        <th>Name   </th>
                        <th>Phone_Number  </th>
                        <th>Address</th>
                        <th>Country </th><th></th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Subject</th>
                        <th>s_checkbox</th>
                        <th>o_details</th>
                    </tr>
    


                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM f_form";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $Name = $row['Name'];
                                $Phone_Number = $row['Phone_Number'];
                                $Address = $row['Address'];
                                $Country = $row['Country'];
                                $City = $row['City'];
                                $State = $row['State'];
                                $Pincode = $row['Pincode'];
                                $Subject = $row['Subject'];
                                $s_checkbox = $row['s_checkbox'];
                                $o_details = $row['o_details'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $Name; ?></td>
                                    <td><?php echo $Phone_Number; ?><td>
                                    <td><?php echo $Address; ?><td>
                                    <td><?php echo $Country; ?><td> 
                                    <td><?php echo $City; ?><td>    
                                    <td><?php echo $State; ?><td> 
                                    <td><?php echo $Pincode; ?><td> 
                                    <td><?php echo $Subject; ?><td> 
                                    <td><?php echo $s_checkbox; ?><td> 
                                    <td><?php echo $o_details; ?><td> 
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //information not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Informations not yet added. </td> </tr>";
                        }

                    ?>
                                        

                    
                </table>
                <a href ="logout.php"><button type="submit">Logout</a>
</body>
</html>
    