<?php 

$conn = mysqli_connect('localhost','root','', 'organisation') or die('Connection Failed'.mysqli_connect_error());                                

$eid = $_GET['eid'];
$delete = mysqli_query($conn,"delete from employees where e_id = '$eid'");

if($delete > 0){
    echo "<center><h2>Successfully Deleted</h2></center>"; 
    echo '<center><a href="http://localhost/organisation/records.php">Go Back</a></center>';
}
else{
    echo "<center><h2>Error in Deleting</h2></center>"; 
    echo '<center><a href="http://localhost/organisation/records.php">Go Back</a></center>';
}

?>