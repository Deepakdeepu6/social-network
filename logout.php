<?php
session_start();
include("process.php");
$sl="update login set online=0 where email='".$_SESSION['email']."'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
if($result)
header("location:login.php");
session_destroy();

?>