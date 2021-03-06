<?php
include("process.php");
$value=$_POST['search'];
$sl="select pemail from post where pid='$value'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result))
{
    $email=$row['pemail'];
    $sr="select * from login where email='$email'";
    $resu=mysqli_query($conn,$sr) or die(mysqli_error($conn));
    while($row1=mysqli_fetch_array($resu))
    { 
        echo "<img src='image/".$row1['image']."'>";
    }
}



?>