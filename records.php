<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newRecordsStyle.css">

</head>
<body>
    

<?php
error_reporting(0);

$conn = mysqli_connect('localhost','root','', 'organisation') or die('Connection Failed'.mysqli_connect_error());  
$dup = mysqli_query($conn,"Select * from employees order by e_first_name");

echo "<table id=people>";
echo "<tr> <th>ID</th> <th>Employee First Name</th> <th>Employee Last Name</th> <th>Department</th></tr>";

$count = 0;
while($row = mysqli_fetch_array($dup,MYSQLI_ASSOC)){

    $department_id =  $row['e_department'];
    $query_instance = mysqli_query($conn,"SELECT * FROM `departments` where `d_id` = '$department_id' ");
    $row_temp = mysqli_fetch_row($query_instance);
    $name_of_department =  $row_temp[1] ;


    $count++;
    if(1==$count%4){
        echo "<tr  bgcolor= #9400D3 >";//Voilet
    }
    else if(2==$count%4){
        echo "<tr  bgcolor= #4B0082 >";//Indigo
    }
    else if(3==$count%4){
        echo "<tr  bgcolor= #009900 >";//Green
    }
    else{
        echo "<tr  bgcolor= #FF0000 >";//Red
    }
    echo "<td>". $row['e_id']  ."</td>";
    echo "<td>". $row['e_first_name']  ."</td>";
    echo "<td>". $row['e_last_name']  ."</td>";
    echo "<td>". $name_of_department  ."</td>";
    echo "<td> <center> <a href= 'edit.php?id=$row[e_id]&fn=$row[e_first_name]&ln=$row[e_last_name]&ed=$name_of_department' ><Button id=button1>Edit</Button> </center> </td>";
    echo "<td> <center> <a href= 'delete.php?eid=$row[e_id]' > <Button id=button2>Delete</Button> </center> </td>";
    echo "</tr>";
    
  
}


?>
</body>
</html>






