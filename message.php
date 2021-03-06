<?php
session_start();
include("process.php");
ob_start();
$email=$_GET['email'];
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<head>
<title>Chat Box</title>
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
.header {
    background-color:blue;
    border:1px solid black;
    box-shadow:2px 2px 2px 2px grey;
    margin:10px;
    border-radius:10px;
    font-weight:bold;
    font-size:25px;

}
.header img{
height:70px;
max-width:70px;
margin:10px auto;
width:100%;
border-radius:40%;
}
.header span{
    font-family:verdana;
    padding-left:10px;
   color:#ffffff;
    padding-left:20px;
    letter-spacing:4px;
    font-weight:bold;
}
@media only screen and (max-width:600px)
{
    .header img{
height:50px;
max-width:50px;
     
    }
    .header span{
        font-size:15px;
    font-weight:100;


    }
}
.chatting{
    background-color:#ffffff;
    border:1px solid black;
    box-shadow:2px 2px 2px 2px grey;
    margin:10px;
    border-radius:10px;
    
}
.form-control{
    margin:40px auto;
    background-color:#D6EAF8;

    height:30px;
    width:100%;
    box-shadow:2px 2px 2px 2px grey;
    overflow:scroll;
    font-size:30px;
    font-weight:200;

}
textarea{
    margin-bottom:2px;
    max-width:500px;
    text-indent:10px;
}
div.p{
    overflow:scroll;
    height:500px;
    width:100%;
    margin:auto;
    font-size:25px;
}
@media only screen and (max-width:700px)
{
    div.p{
        font-size:10px;
 
    }
    .container{
        transform:scale(0.7);
        margin:-100px auto;
    }
}
.right{
    text-align:right;
}
.on{
    background-color:green;
    color:green;
    border-radius:95%;
    transform:scale(0.5);
}
</style>
<body>
<div class="container">
 <div class="row header mt-4"> 
  <?php 
  $sl="select * from login where email='$email'";
  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  while($row=mysqli_fetch_array($result))
  {
      ?>
     
   <div class="col-12 ">
      <a href='userpage.php' class='btn btn-info'>&larr;</a> <?php 
      
      if(empty($row['image']) && $row['gender']=='male')
            echo "<img src='man.jpg'>";
            else if(empty($row['image']) && $row['gender']=='female')
            echo "<img src='woman.jpg'>";
             
            else
            echo "<img src='image/".$row['image']."'>";
      
      ?>
      
       <span class='name'><?php echo $row['name']?></span>
    <?php if($row['online']==1)
          echo "<span class='on' ></span>";
    ?>
       </div>
      <?php
  }
   ?>
   
  </div>
   
   <div class="row chatting">
      <div class="col-12">
         
      <div class="p">
     <?php
     $main=$_SESSION['email'];
      $sd="select * from chat where (tooemail='".$_SESSION['email']."' and froemail='$email')  or(froemail='".$_SESSION['email']."' and tooemail='$email') order by timed desc";
      $result=mysqli_query($conn,$sd) or die(mysqli_error($conn));
         while($row=mysqli_fetch_array($result))
         { 
            echo "<hr>";
            $time=12-substr($row['timed'],11,2);
            if($time==0) 
             $time=12; 
            echo "</br>";
echo "<p>";

              if($row['froemail']==$main)
            {
                ?>
              <div class='right' style="color:red;">
               
              <?php
                 if($time>0) 
                 echo "<small>".substr($row['timed'],0,16)."am</small>";             

               else
               echo substr($row['timed'],0,11).substr($time,1,10).":".substr($row['timed'],14,2)."pm";
               echo "</b>";


               echo "</br>";
              ?>
              </br>
            

             
              <?php echo $row['text']?>

              </div>

            <?php
            }
           
            else
            {
                ?>
              <div style="color:blue;">
              <?php if($time>0)               
                                            echo "<small>".substr($row['timed'],0,16)."am</small>";             
else
               echo substr($row['timed'],0,11).substr($time,1,10).":".substr($row['timed'],14,2)."pm";             
                 echo "</b>";


               echo "</br>";
             ?></br>

             <?php echo $row['text']?>

              </div>

            <?php
            }
 
echo "</p>";
         }
      ?>
      
      </div>
      <form action="" method="post">
       <div class="input-group">
    
        <textarea id='text' autofocus='1' name="text" class="form-control"></textarea>
        <div class="input-group-append">
      <span class="input-text"><button name="submit" class='btn btn-primary btn-lg btn-block mt-5 '><i class='fa fa-send fa-2x'></i></button></span>
        </div>

       </div>

      </form>
      </div>
     
   
   </div>
  

</div>
<?php
if(isset($_POST['submit']))
{
  $text=mysqli_real_escape_string($conn,$_POST['text']);
  $tooemail=$email;
   $froemail=$_SESSION['email'];
   $sd="insert into chat(text,tooemail,froemail) values('$text','$tooemail','$froemail')";
   $result=mysqli_query($conn,$sd) or die(mysqli_error($conn));
   if($result)
   {
    ?>
     <script>
  document.getElementById("text").value='';
     </script>
    <?php   
    header("location:message.php?email=$email");
   }
}
?>
</body>
</html>