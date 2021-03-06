
<style>
.display{
    color:red;
}
.display1{
    color:green;
}
</style>
<?php
include("process.php");
$search=$_POST['search'];
if(!empty($search))
{
 $sl="select * from login where name='$search'";
 $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
 if(mysqli_num_rows($result)>0)
 {
     echo "<div class='display'><sup>*</sup>This Name Already Exists</div>";
 }
else
echo "<div class='display1'><sup>*</sup>Nice Name<i class='fa fa-smile-o'></i></div>";
}



?>
