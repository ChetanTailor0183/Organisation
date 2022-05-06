<?php 

$conn = mysqli_connect('localhost','root','', 'organisation') or die('Connection Failed'.mysqli_connect_error());     

session_start();
$_SESSION['myid'] = $_GET['id'];


$id = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$ed = $_GET['ed'];

?>


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
     <form action="update.php" method="POST" enctype="multipart/form-data">

     <label for = "fname" >Employee First Name</label>
     <input type="text" name = "fname" id="fname"  value="<?php echo $fn  ?>"  />
     <br>

     <label for = "lname" >Employee Last Name</label>
     <input type="text" name = "lname" id="lname"  value="<?php echo $ln ?>"  />
     <br>

     <label for="dname">Select your Department : </label>

        <select name="dname" class="form-control" value="<?php echo $ed  ?>" >
        <option value="pick"></option>
            <?php
            $sql = mysqli_query($conn, "SELECT d_name From departments");
            $row = mysqli_num_rows($sql);
            while ($row = mysqli_fetch_array($sql)){
                if($row['d_name']==$ed){
                    echo "<option value='". $row['d_name'] ."' selected  >" .$row['d_name'] ."</option>" ;
                }
                else{
                    echo "<option value='". $row['d_name'] ."' >" .$row['d_name'] ."</option>" ;
                }
            }
            ?>
        </select>


     <input type="submit" name="submit" id="submit" />

     </form>
    </div>
    </center>
</body>
</html>