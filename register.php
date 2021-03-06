<?php
session_start();
include("process.php");
ob_start();
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>

  </head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta charset="utf-8">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="icon" href="adminfavicon.png">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="icon" href="">
<style>
#signup {   
  width:100%;
    margin: auto;
    
    display:block;
}



#signup.active{
  display:block;
  z-index:1;
  top:0px;
position:absolute;
transition:1s;
transform:scale(0.9);
 
}
#signup .insiderow{
    background-color:#ffffff;
    max-width:500px;
    margin:0px auto;
  width:100%;
  margin-bottom:10px;
  text-align:center;
  border:1px solid black;
  z-index:1;
}
a{
    color:#ffffff;
}
</style>
<script>
 $(document).ready(function(){
          $("#name").keyup(function(){
              var search=$(this).val();
              if(search=='')
              {

              }
              else
              {
                  $.ajax({
                   url:"searchname.php",
                   method:"post",   
                   data:{search:search},
                   dataType:"text",
                   success:function(response){
                     $("#display").html(response);
                   }          
 

                  });
              }
          });
       });


</script>
<body>

<div class="container-fluid signup" id="signup">
   
    <div class="row insiderow">
    <button id="signin" class="btn btn-primary btn-sm "  ><a href='login.php'><i class="fa fa-close fa-2x"></i></a></button></center>
      <h2 class="text-center" style="font-size:30px;">Register Here</h2>
      
      <div class="col-12 signinside">
      <hr>
      <form action="" method="post">
      <div id="display"></div>
        <input type="text" class="form-control"  autofocus="1" placeholder="Name" name="username" id="name" required></br>
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required></br>
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required></br>
        <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword" required></br>


        <input type="number" class="form-control" placeholder="Number" name="number" id="number" required></br>
        <input type="text"  class="form-control" placeholder="DoB" name="date" id="date" onfocus="this.type='date'" required></br>
        <label for="gender">Male:</label><input type="radio" class="form-control" name="gender" value="male" id="gender" required></br>
        <label for="gender1">Female:</label><input type="radio" class="form-control" name="gender" value="femail" id="gender2" required></br>
        <button name="signup" class="btn btn-success btn-lg btn-block">Submit</button>
        </form>
    <?php
    if(isset($_POST['signup']))
    {   
           $username=mysqli_real_escape_string($conn,$_POST['username']);
           $email=mysqli_real_escape_string($conn,$_POST['email']);
           $password=mysqli_real_escape_string($conn,$_POST['password']);
           $confirm=mysqli_real_escape_string($conn,$_POST['cpassword']);
           $number=mysqli_real_escape_string($conn,$_POST['number']);
           $date=mysqli_real_escape_string($conn,$_POST['date']);
          $gender=mysqli_real_escape_string($conn,$_POST['gender']);
           if($confirm!=$password)
           {
            ?>
               <script>
               $(document).ready(function(){
                swal({
                 title:"Error",
                 text:"Sorry Password Not Matching",
                 icon:"error",
                });
                });
               </script>
            <?php
           }
           else
           {
             $sr="select * from login where email='$email'";
             $res=mysqli_query($conn,$sr) or die(mysqli_error($conn));
             if(mysqli_num_rows($res)>0)
             {
                ?>
                <script>alert('Email Id Already Exists');</script>
                <?php
              
             }
             else
             {
            $sd="insert into login (name,email,password,number,date,gender) values('$username','$email',' $password','$number','$date','$gender')";
            $res=mysqli_query($conn,$sd) or die(mysqli_error($conn));
            if($res)
            {
              ?>
              <script>
               $(document).ready(function(){
              swal({
                title:"Success",
                text:"You Are a SociNet Member Now",
                icon:"success",
              });
              });
              </script>
              <?php
            }
            else
            echo mysqli_error($conn);

           }
          }
    }
    ?> 
      </div>
    </div>
  </div>
  
</body>
</html>