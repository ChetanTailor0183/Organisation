<?php

session_start();
$id = $_SESSION['myid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'organisation') or die('Connection Failed' . mysqli_connect_error());

    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['dname'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dname = $_POST['dname'];

        $query_instance = mysqli_query($conn,"SELECT * FROM `departments` where `d_name` = '$dname' ");
        $row = mysqli_fetch_row($query_instance);
        $id_of_department =  $row[0] ;

        $sql = "UPDATE  `employees` 
                        SET `e_first_name` = '$fname' , `e_last_name` = '$lname' , `e_department` = '$id_of_department' 
                        WHERE `e_id` = '$id' ";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<center><h2>Updated Successfully</h2></center>";
            echo '<center><a href="http://localhost/organisation/home.php">Go Back</a></center>';
        } else {
            echo "<center><h2>Error Occurred while Updating</h2></center>";
            echo '<center><a href="http://localhost/organisation/home.php">Go Back</a></center>';
        }
    }
}
