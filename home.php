<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="HomeStyle.css">
</head>
<body>

<center>
    <div class="form-style-6">

    <h1>Organisation Management</h1>
     <form id="inputform" action="insert.php" method="POST" enctype="multipart/form-data">

     <label for = "fname" >Employee First Name</label>
     <input type="text" name = "fname" id="fname"  required  />
     <br>

     <label for = "lname" >Employee Last Name</label>
     <input type="text" name = "lname" id="lname"  required  />
     <br>

     <label for="dname">Select your Department</label>

        <select name="dname" class="form-control" >
        <option disabled selected value> -- select an option -- </option>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'organisation') or die('Connection Failed' . mysqli_connect_error());
            $sql = mysqli_query($conn, "SELECT d_name From departments");
            $row = mysqli_num_rows($sql);
            while ($row = mysqli_fetch_array($sql)){
            echo "<option value='". $row['d_name'] ."'>" .$row['d_name'] ."</option>" ;
            }
            ?>
        </select>

     <input type="submit" name="submit" id="submit" />

     </form>

     <div style="margin-top: 15px;">
     Click <a href="http://localhost/organisation/records.php">here</a> to See records
     </div>


    </div>

    </center>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" >
    </script>


    <script type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js">
    </script>


    <script type="text/javascript" 
    src="custom.js">
    </script>

</body>
</html>