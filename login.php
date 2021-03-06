
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
body {
    background-color:#D6EAF8;
}
.row
{
    
    
    width:100%;
    margin:200px auto;
   

}
.left{
    margin:auto;
    text-align:center;
   
}
.left p{
}
.left .symbol
{
    font-size:40px;
    font-weight:bold;
    margin:auto;
    letter-spacing:5px;
    font-family:verdana,sans-serif;
    color:#008000 ;
}
 .left .content {
    font-size:30px;
    font-weight:150;
    font-family:verdana,sans-serif;
    color:#000000 ;
    margin:auto;
    
} 
@media only screen and (max-width:600px)
{   .left .symbol,.left .content
    {
        
    font-size:22px;
    
       
    }
    .left .content
    {
      font-size:20px;
    font-weight:bold;

    }
}
.right{
 
   width:100%;
   
  
}

.right form {
    box-shadow:2px 2px 2px 2px grey;
    max-width:500px;
    background-color:#ffffff;
    width:100%;
    padding:20px;
   
}
.right form small{
    font-style:italic;
    font-size:16px;
    color:#000000;
    
}

.form-control{
    height:50px;
}
#signup {   
  width:100%;
    margin: auto;
    
    display:none;
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
.signinside label{
    font-weight:bold;
    
}
#dpass,#strong,#num{
  color:red;
  font-size:16px;
  text-align:left;
}
#display{
  text-align:left;
}
</style>
<script>

 function close1(){
    document.getElementById("signup").style.display="none";
    document.getElementById("main").style.cssText="filter:blur(0px)";
    }
    function signup(){
     document.getElementById("signup").style.display="block";
     document.getElementById("main").style.cssText="filter:blur(4px)";
    //  document.getElementById("formm").style.cssText="filter:blur(4px)";

 }
  function focus1(){
 var email=document.getElementById("email1").value;
 if(email=="")
 document.getElementById("email1").style.fontWeight="0";
 else
 document.getElementById("email1").style.fontWeight="bold";
}
function focus2(){
    var password1=document.getElementById("password1").value;
  if(password1="")
  document.getElementById("password1").style.fontWeight="0";
  else
 document.getElementById("password1").style.fontWeight="bold";
}
function change()
{    var pass0=document.getElementById("password1");
    var pass=document.getElementById("password1").value;
    if(pass0.type=="password")
    { 
           pass0.type="text"; 

    }
    else
    pass0.type="password";
    
}
$(document).ready(function(){
          $("#name").keyup(function(){
              var search=$(this).val();
              if(search!='')
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
          $("#pass1").keyup(function(){
              var pass1=$(this).val();
              len=pass1.toString().length;
              if(len<5)
         {$("#strong").html("<sup>*</sup>Weak Password");
         }
        else
        {
         $("#strong").css("color","green");

        $("#strong").html("<sup>*</sup>Strong Password");
        }

          $("#pass2").keyup(function(){
            var pass2=$(this).val();
        if(pass1==pass2)
       {  $("#dpass").css("color","green");

        $("#dpass").html("<sup>*</sup>Good To Go");
       }

        else
        {  $("#dpass").css("color","red");
       
          $("#dpass").html("<sup>*</sup>Password Not Matching");
        }
          });
         
  

       });
       $("#number").keyup(function(){
              var num1=$(this).val();
              len=num1.toString().length;
              if(len<10)
         $("#num").html("<sup>*</sup>Not a Valid Number");
        else
        {
          $("#num").css("color","green");
        $("#num").html("<sup>*</sup>Perfect");
        }
         });
       });
  </script>
<body>  
<!-- start of signup form -->
<div class="container-fluid signup" id="signup">
   
    <div class="row insiderow">
    <button id="signin" class="btn btn-primary btn-sm "  onclick="close1()"><i class="fa fa-close fa-2x"></i></button></center>
      <h2 class="text-center" style="font-size:30px;">Register Here</h2>
      
      <div class="col-12 signinside">
      <hr>
      <form action="" method="post">
      <div id="display"></div>
        <input type="text" class="form-control"  autofocus="1" placeholder="Name" name="username" id="name" required></br>
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required></br>
        <div class='' id='strong'></div>
        <input type="password" id='pass1' class="form-control" placeholder="Password" name="password"  required></br>
        <div class='' id='dpass'></div>

        <input type="password" id='pass2' class="form-control" placeholder="Confirm Password" name="cpassword"  required></br>
          <div class='num' id='num'></div>
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
             
             $sr="select * from login where email='$email' or name='$username'";
             $res=mysqli_query($conn,$sr) or die(mysqli_error($conn));
             if(mysqli_num_rows($res)>0)
             {
                ?>
                <script>alert('Email/name  Id Already Exists');</script>
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
  
  <!-- End of Sign Up form -->


  <div class="container-fluid main" id="main">
   <div class="row">
      <!-- Left column -->
     <div class="col-12 col-sm left">
      <b><p> <span class="symbol">SociNet</span></p><br/><p><span class="content">Connect With The People You Now</span></b></p>
     </div>
     <!-- Right Column -->
     <div class="col-12 col-sm right" >
       <!-- Start of Login  form -->
         
       <form action="" method="post" id="formm">  
         
          <input type="email" placeholder="Email" name="email" class="form-control" autofocus="1" value='<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']?>' onchange="focus1()" id="email1" required></br>
          
          <!-- Postpend the eye to see password -->
           <div class="input-group">
           <input type="password" placeholder="Password" name="password" id="password1" value='<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']?>'' class="form-control" onchange="focus2()" required></br>
           <div class="input-group-apend" ">
           <span class="input-group-text" onclick="change()"><i class="fa fa-key fa-2x" style="height:35px;"  ></i></span>

           </div>
          
          </div>
          <!-- End of PostPend --></br>
        <input type='checkbox' name="check" id='check' <?php if(isset($_COOKIE['email'])) echo "checked" ?> ><label for="check">&nbsp;<strong>Remember me</strong></label>
        <button name="login" name="login" class="btn btn-primary btn-sm btn-block">Login </button></br>

                   <small>Don't Have a Account?<u style="cursor:pointer;color:#16A085;"><b onclick="signup()">Sign-Up</b></u> Here</small>
          </form>
    <?php
    if(isset($_POST['login']))
    {
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $password=mysqli_real_escape_string($conn,$_POST['password']);
      $sl="select * from login where email='$email'";
      $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
      $row=mysqli_num_rows($result);
      if($row>0)
      {
        $se="select * from login where email='$email' and password='$password'";
        $rese=mysqli_query($conn,$se) or die(mysqli_error($conn));
       $row1=mysqli_fetch_array($rese);
        
          if($row1['email']==$email && $row1['password']==$password)
          {
             $gf="update login set online=1 where email='$email'";
             $re=mysqli_query($conn,$gf) or die(mysqli_error($conn));
            $_SESSION['email']=$row1['email'];
            if(isset($_POST['check']))
            {  
              
              setcookie("email",$email,time()+(10*365*24*60*60));
              setcookie("password",$password,time()+(10*365*24*60*60));

            }
            header("location:userpage.php");
          }
          else
          {
            ?><script>
            alert("invalid Username or Password");</script><?php
          }
        }
     
      else
      {
        ?>
        <script>
        swal({
          title:"Error",
          text:"Sorry Email Id Not Found",
          icon:"warning",
        });

        </script>
        <?php
      }
    }
  
    ?>

    <!-- End of Login form -->
     </div>
   </div>
  
</body>

</html>