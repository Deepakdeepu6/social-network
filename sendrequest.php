<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="icon" href="adminfavicon.png">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
include("process.php");
session_start();
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
 
$fremail= $_SESSION['email'];
 $toemail=$_GET['email'];




 $sb="select * from friends where toemail='$fremail' and fremail='$toemail' and response=0 ";
 $resultsb=mysqli_query($conn,$sb) or die(mysqli_error($conn));
if(mysqli_num_rows($resultsb)==1)
{ 
    $as="update friends set response=1 where toemail='$fremail' and fremail='$toemail'";
    $result=mysqli_query($conn,$as) or die(mysqli_error($conn));
    if($result)
    {
        ?>
    <script> 
    window.location.href='friendpage.php?email=<?php echo $toemail?>';
    </script>

<?php
    }
 }

 else{
 $sf="select * from friends where toemail='$toemail' and fremail='$fremail'";
 $result=mysqli_query($conn,$sf) or die(mysqli_error($conn));
 if(mysqli_num_rows($result)==0)
 {
$sl="insert into friends(toemail,fremail) values('$toemail','$fremail')";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));

    ?>
    <script>
    $(document).ready(function(){
    swal({
        title:"Successfully Sent",
        text:"Success",
        icon:"success"
    }).then(okay=>{
         if(okay)
         {
            window.location.href='friendpage.php?email=<?php echo $toemail?>';

         }
    });
});
    </script>

    <?php

 }
else
{
    $sl="delete from friends where toemail='$toemail' and fremail='$fremail'";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
   if($result)
   {
   ?>
    <script>
    $(document).ready(function(){
    swal({
        title:"Unsent",
        text:"Request Unsent",
        icon:"success"
    }).then(okay=>{
         if(okay)
         {
         window.location.href='friendpage.php?email=<?php echo $toemail?>';
         }
    });
});
    </script>

    <?php
   }
} 
 }
?>
