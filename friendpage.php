<?php
session_start();
include("process.php");
$email=$_GET['email'];
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html>
 <head>

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

<style>
body{
    background-color:#6ECDBA ;
}
.main{
    margin:10px auto;
}
 .row{
    background-color:#ffffff;
    box-shadow:2px 2px 2px 2px grey;
    width:100%;
    margin:auto;
}
.main .row legend img{
    
    max-width:220px;
    border-radius:10%;
}
.main h1{
    font-style:verdana;
    font-weight:bold;
    letter-spacing:4px;
    color:lime;
    text-transform:uppercase;
}
.main h2{
    font-family:verdana;
    font-weight:50;
    letter-spacing:4px;
    color:#000100;
    font-style:italic;
    text-transform:uppercase;
}
.main .row img{
    
    
    height:220px;
    max-width:220px;
    width:100%;

}
.col-sm-3 {
  font-size:20px;
  font-weight:100;
  max-width:600px;
  width:100%;
  font-family:verdana;
  color:#000000;
}
@media only screen and (max-width:600px)
{
  .col-sm-3{
    font-size:16px;
  font-weight:100;
  }
}
</style>
<body>
<div class="container  main " id="post">
<a href='userpage.php?get=view' class='btn btn-danger'>&times;</a> 
   <div class="row" id="post1">
     <div class="col-12 col-sm-12 " ></br>
     <!-- Start of Profile -->
     <form action="" method="post" class='text-center' enctype="multipart/form-data">
      
      <?php
        $sl="select * from login where email='$email'";
        $result=mysqli_query($conn,$sl) or die(mysqli_error($sl));
        while($row=mysqli_fetch_array($result))
        {   ?>
        <h1 class='text-center'><?php echo $row['name']?></h1><span><h2 style="text-align:center;">Profile</h2></span>

            <?php
            if(empty($row['image']) && $row['gender']=='male')
            echo "<img src='man.jpg'>";
            else if(empty($row['image']) && $row['gender']=='female')
            echo "<img src='woman.jpg'>";
             
            else
            echo "<img src='image/".$row['image']."'>";
        }
      ?>
     
      </form>
      </br>
      </div>
        <div class="col-12" class='text-left'>
        <form action="" method="post"  enctype="multipart/form-data">
      <?php
        $sl="select * from login where email='$email'";
        $result=mysqli_query($conn,$sl) or die(mysqli_error($sl));
        $rf="select * from friends where toemail='$email' and response=1 or (fremail='$email' and response=1)";
        $result2=mysqli_query($conn,$rf) or die(mysqli_error($conn));

        $count=mysqli_num_rows($result2);
        while($row=mysqli_fetch_array($result))
        {   ?>
               <div class="conatiner-fluid">
               <div class="row">
                  <div class="col-12 col-sm-3">
                 Name:<?php echo $row['name']?>
                  </div>
                  <div class="col-12 col-sm-3">
                  Email:<?php echo $row['email']?>
                  
                  </div>
                  <div class="col-12 col-sm-3">
                  Account-Mode:<?php echo $row['mode']?>
                  
                  </div>
                  <div class="col-12 col-sm-3">
                  Gender:<?php echo $row['gender']?>
                  
                  </div></br>
                  <div class="col-12 col-sm-3">
                  Friends:<?php echo $count;?>
                  
                  </div></br>
                  </br>
               </div>
               <div class="row">
               <div class="col-12">
              <?php  
              if($email==$_SESSION['email'])
              {
                ?>
                <script>
                      document.getElementById("form").style.display="none";
                </script>
                <div class="alert alert-info text-center">
                   <strong>Your Profile</strong>
                </div>

                <?php
              }
              
              else
              {
                echo "<form id='form'>";
             
             ?>  <script>
                document.getElementById("form").style.display="block";
          </script><?php 
          $n=1;
            $st="select * from friends where toemail='".$_SESSION['email']."' and fremail='$email' and response='$n' or (toemail='$email' and fremail='".$_SESSION['email']."' and response='$n')";
            $resulttp=mysqli_query($conn,$st) or die(mysqli_error($conn));
            if(mysqli_num_rows($resulttp)==1)
           
           {?>
             <center><a href='message.php?email=<?php echo $email?>'><i class='fa fa-send fa-2x'></i></a></br></center>
           </br>
            <a  class='btn btn-success btn-lg btn-block' role='button' href=''>Friend's</a>
          <?php
            }
             
     
          else{
            $sb="select * from friends where toemail='".$_SESSION['email']."' and fremail='$email' and response=0";
            $resultsb=mysqli_query($conn,$sb) or die(mysqli_error($conn));
            if($row=mysqli_num_rows($resultsb))
            {
              ?>
           <a  class='btn btn-secondary btn-lg btn-block' role='button' href='sendrequest.php?email=<?php echo $email?>'>Respond</a>
            <?php
            }

          else

         {
              ?>
             
            <?php
            $sd="select * from friends where toemail='$email' and fremail='".$_SESSION['email']."'";
            $result3=mysqli_query($conn,$sd) or die(mysqli_error($conn));
           
             if(mysqli_num_rows($result3)==0)
            {
              ?>
           <a  class='btn btn-primary btn-lg btn-block' role='button' href='sendrequest.php?email=<?php echo $email?>'>Send Request</a>
            <?php
            }
             else
             {
            ?>
            <a class='btn btn-outline-danger btn-lg btn-block' role='button' href='sendrequest.php?email=<?php echo $email?>'>Unsend Request</a>
             <?php
             } 
            
            ?>
               </div>
               </div>
               </div>
            <?php
            









              }
          }              

            echo "</form>";
       

        }
      ?>
      <?php
        }
   ?>

        </div>
      </div>

      </br>
      </br>
      </br>
      <hr>
      <div class='row'>
      <!-- Display Full Image -->
      <div class="col-12 col-sm-12 text-center">
       <?php

      $sk="select * from friends where toemail='".$_SESSION['email']."' and fremail='$email' and response=1 or (fremail='".$_SESSION['email']."' and toemail='$email'  and response=1) ";
      $resulty=mysqli_query($conn,$sk) or die(mysqli_error($conn));
      $count=mysqli_num_rows($resulty);
      if($count>0)
      {   $sh="select * from post where pemail='$email' order by timep desc";
        $resutl=mysqli_query($conn,$sh) or die(mysqli_error($conn));

        while($row=mysqli_fetch_array($resutl))
       {  
          if(!empty($row['images']))
           {
             ?>
             <div class="card">
              <div class="card-header">
            <?php echo "<img class='insideimg' src='image/".$row['images']."'>"; ?>
             </div>
             
             <div class="card-footer">
                     <?php if(!empty($row['text'])) ?>
                       <p><?php echo $row['text']?></p>
            <b><?php
           $time=12-substr($row['timep'],11,2);
           if($time==0) $time=12;
            if($time>0 )
           echo substr($row['timep'],0,16)."am";
           else
             echo substr($row['timep'],0,11).substr($time,1,10).":".substr($row['timep'],14,2)."pm";?></b>
           </div>
           </div>
             </br>
             <hr>
               <?php
           }
           else
           { ?>
               <h2>No Recent Posts Till Now</h2>;
           <?php
           }
          }
      }

  //  if not friends
     else{
       $sd="select * from post,login where pemail='$email' and email='$email'  order by timep desc";
       $result2=mysqli_query($conn,$sd) or die(mysqli_error($conn));
      
       while($row=mysqli_fetch_array($result2))
       {  if($row['mode']=="public")
        {
           if(!empty($row['images']))
           {
             ?>
             <div class="card">
              <div class="card-header">
            <?php echo "<img class='insideimg' src='image/".$row['images']."'>"; ?>
             </div>
             
             <div class="card-footer">
                     <?php if(!empty($row['text'])) ?>
                       <p><?php echo $row['text']?></p>
            <b><?php
           $time=12-substr($row['timep'],11,2);
           if($time==0) $time=12;
            if($time>0 )
           echo substr($row['timep'],0,16)."am";
           else
             echo substr($row['timep'],0,11).substr($time,1,10).":".substr($row['timep'],14,2)."pm";?></b>
           </div>
           </div>
             </br>
             <hr>
               <?php
           }
           else
           { ?>
               <h2>No Recent Posts Till Now</h2>;
           <?php
           }
        }
        else
        { 
            ?>
            <h2>This Account Is Private</h2>;
        <?php

        }
       }
      }
      ?>
    </div>
      </div>
      </div>

</body>
</html>