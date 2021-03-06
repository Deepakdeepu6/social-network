<?php
include("process.php");
session_start();
ob_start();
$email=$_SESSION['email'];
if(!isset($_SESSION['email'])){
   
    header('location:login.php');
    exit;
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:login.php');
    exit;
}
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
.main .row{
    background-color:#ffffff;
    box-shadow:2px 2px 2px 2px grey;
    width:100%;
    margin:auto;
}
.main .row legend img{
    
        max-width:220px;
        border-radius:10%;
}
#edit{
    display:none;
    margin:auto;
    width:100%;
    max-width:400px;
}

#edit .row{
    position:absolute;
    margin:auto;
    background-color:#000000;
    top:150px;
    z-index:1;
    color:#ffffff;
    border:1px solid black;
       box-shadow:2px 2px 2px 2px grey;
}
 .symbol
{
    font-size:50px;
    font-weight:bold;
    
    margin:auto;
    letter-spacing:15px;
    font-family:verdana,sans-serif;
    color:#008000 ;
}
@media only screen  and (max-width:600px)
{
    .symbol{
        font-size:25px;
        
    }
}
#image1 img{
    border:2px solid black;
    
}

#post1{
    
    display:block;
    
    

}
input[type='file']
{
    background-color:#D6EAF8;

}
#post1 textarea{
    height:120px;
    background-color:#D6EAF8;
   
}
.insideimg{
    height:220px;
    max-width:220px;
    width:100%;
}
/* View Starts */
#view .alert
{
    ` text-align:center; 
}
#view img{
    border:2px solid black;
    height:220px;
    max-width:220px;
    width:100%;
    transform:scale(0.7);

}
#view .profile{
    cursor:pointer;
    
   
}
#view .profile img{
    height:70px;
    width:70px;
    border-radius:50%;
}
@media only screen and (max-width:650px)
{
    #view{
        font-size:16px;
        font-weight:0px;
    }
} 
#display{
    position:absolute;
    width:100%;
    margin:30px auto;
    z-index:1;
    display:block;
    height:100px;
   
  
}
#display img{
    height:600px;
    width:100%;
    max-width:700px;

}
#buttonclose{
    position:absolute;
    left:-200px;
    
    margin:80px auto;
    width:100%;
}
#Request .second{
    background-color:#ffffff ;
    width:100%;
    margin:auto;
    max-width:600px;
    text-align:center;
}
#Request img{
    max-width:220px;
        border-radius:10%;
        height:200px;
} 
#list .second{
    background-color:#ffffff ;
    width:100%;
    margin:auto;
    max-width:600px;
    text-align:center;
}
#list img{
    max-width:100px;
        border-radius:10%;
        height:100px;
}
@media only screen and (max-width:600px)
{
  .navbar-custom>a:link{
    font-size:7px;
  }
}
</style>
<script>
function close1(){
    document.getElementById("post1").style.cssText="filter:blur(0px)";
    document.getElementById("edit").style.display="none";

}
function display(){
//     if(    document.getElementById("edit").style.display="none"  )
// {
    document.getElementById("edit").style.display="block";
    document.getElementById("post1").style.cssText="filter:blur(3px)";
// }
    
   
}
$(document).ready(function(){
  $("#listing").keyup(function(){
  var list=$(this).val();
  
  $.ajax({
    url:"find.php",
    method:"post",
    data:{search:list},
    dataType:"text",
    success:function(response)
    {
      $("#listingd").html(response);
    }

  });

  });
 

  });
 

$(document).ready(function(){
  $("#tlisting").keyup(function(){
  var tlist=$(this).val();
  $.ajax({
    url:"find.php",
    method:"post",
    data:{searcht:tlist},
    dataType:"text",
    success:function(response)
    {
      $("#tlistingd").html(response);
    }

  });
});
});

</script>
<body>

 <div class="container text-center" >
 <h1><b><span class="symbol">SociNet</span></h1>
 <nav class="nav navbar-custom nav-pills nav-justified">
       
       <a class="nav-item nav-link <?php
   if(empty($_GET['get']))
    echo "active";
  


 ?> " data-toggle="tab"  href="#post">Create Post</a>
       <a class="nav-item nav-link" data-toggle="tab" href="#view">View Post's</a>
       <a class="nav-item nav-link <?php
   if(empty($_GET['get']))
    echo "";
    


 ?> " data-toggle="tab" href="#Request">Friend's Request</a>
       <a class="nav-item nav-link" data-toggle="tab" href="#list">Friend's list</a>
       <a class="nav-item nav-link"  href="Logout.php">Logout</a>

     </nav>
 </div>

 <div class="tab-content">
   <!-- Post -->
    <!-- Edit Option -->
    <div class="container edit text-center" id="edit">
    <div class="row">
 
    <button class="btn btn-danger btn-sm"   onclick="close1()"><i class="fa fa-close" ></i></button>
    </br><hr>
     <div class="col-12">
       <?php
        $sl="select * from login where email='$email'";
        $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($result))
        {
           ?>
       <form action="" method="post">
             
            <input type="text" value="<?php echo $row['name'];?>" readonly class='form-control' placeholder="name"></br>
            <input type="email"   value="<?php echo $row['email'];?>" readonly class='form-control' placeholder="email"></br>
            <input type="number" name="number"  value="<?php echo $row['number'];?>"  class='form-control' placeholder="number"></br>
            <select class="form-control" name="gender" id="select">
            <option value="male" <?php if($row['gender']=="male") echo "selected";?>>Male</option>
            <option value="female" <?php if($row['gender']=="female") echo "selected";?>>Female</option>


            </select></br>
           <label for="select">Account Mode</label>: <select class="form-control" name="select" id="select">
            <option value="public" <?php if($row['mode']=="public") echo "selected";?>>Public</option>
            <option value="private" <?php if($row['mode']=="private") echo "selected";?>>Private</option>


            </select></br>
            <button class="btn btn-primary btn-sm" name="edit" >Update</button>
            </form>


          


           <?php
           
        }


       ?>
       <!-- Edit Php -->
       <?php
        if(isset($_POST['edit']))
        {
             $number=$_POST['number'];
             $gender=$_POST['gender'];
             $select=$_POST['select'];
             $sl="update login set number='$number',gender='$gender',mode='$select' where email='$email'";
             $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
             if($result)
             {
                 ?>
                  <script>
                  $(document).ready(function(){ 
                  swal({
                      title:"Success",
                      text:"Successfully Updated",
                      icon:"success"
                  }).then(okay=>{
                      if(okay)
                      window.location.href="userpage.php";
 
                  });
                });

                  </script>

                 <?php
               
             }
        }

       ?>
       <!-- end Of Edit -->
     </div>
     </div>
     </div>
    <!-- End of Edit -->
 <div class="container  tab-pane <?php
   if($_GET['get']==("request" || "view"))
   { echo "fade";
    
   }
// else if($_GET['get']=='edited')
// { echo "active";
    
//    }
else
echo "active";
 ?> main " id="post">
    
   <div class="row" id="post1">
     <div class="col-12  col-sm-12"></br>
     <!-- Start of Profile -->
     <form  class='text-center' action="" method="post"  enctype="multipart/form-data">
      <fieldset ><legend style="text-align:center;" id="image1">
      <?php
        $sl="select * from login where email='$email'";
        $result=mysqli_query($conn,$sl) or die(mysqli_error($sl));
        while($row=mysqli_fetch_array($result))
        {
            if(empty($row['image']) && $row['gender']=='male')
            echo "<img src='man.jpg'>";
            else if(empty($row['image']) && $row['gender']=='female')
            echo "<img src='woman.jpg'>";
             
            else
            echo "<img src='image/".$row['image']."'>";
        }
      ?>
      </legend>
      <label for="image">Upload For Profile:</label> <input type="file" accept="image/*" name="profile" id="image">
      </fieldset>
      <button class="btn btn-success btn-sm " name="submit">Upload</button>
       </form>
       <hr>
      
      <!-- Friends count -->
      Friends: <?php
      $sj="select * from friends where toemail='$email'  and response=1 or  (fremail='$email' and response=1)";
      $result1=mysqli_query($conn,$sj) or die(mysqli_error($conn));
      $count=mysqli_num_rows($result1);
      echo $count;
    ?>
    <!-- End of Friends Count -->
    <center><button  class="btn btn-info btn-sm mt-1" onclick="display()"><i class="fa fa-edit">Edit</i></button></center>
       </br>
       </br>
       </br>
       <!-- End of Profile -->
    
    

       <hr>
      <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="profile1" class="form-control"></br>
      <textarea placeholder="Write what You Feel Now" name="text" class="form-control"></textarea></br>
      <button class="btn btn-primary btn-lg btn-block mt-3" name="postsubmit">Post</button>
      </form>
      
  </div>
     <div class="col-12 text-center col-sm-12">
       <?php
       $sd="select * from post where pemail='$email' order by timep desc";
       $result=mysqli_query($conn,$sd) or die(mysqli_error($conn));
      
       while($row=mysqli_fetch_array($result))
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
            if($time>0)
           echo substr($row['timep'],0,16)."am";
           else
             echo substr($row['timep'],0,11).substr($time,1,10).":".substr($row['timep'],14,2)."pm";?></b>
           </div>
           </div>
             </br>
             <hr>
               <?php
           }
       }
      ?>
    </div>

    </div>

   </div>  

   <!-- for View -->
 <div class="container tab-pane
  <?php 
 if($_GET['get']=="view") 
 echo  'active';
 
 else
 echo 'fade'; ?>" id="view">
 <div class="display" id="display"></div>

 <div id="buttonclose"> 
   <button onclick='close2()' class='btn btn-primary btn-sm'>&times;</button>
    </div>
   <div class="alert alert-primary mt-2 text-center" role="alert"><strong>See the Post's of Your Friends Around You</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
   </div>
   <div class="row" id="rowview">
   <div class="col-12 col-sm-12" >
       <?php
    

       $sd="select * from post order by timep desc";
       $result=mysqli_query($conn,$sd) or die(mysqli_error($conn));
      $enail=$_SESSION['email'];
       while($row=mysqli_fetch_array($result))
       {
            
        
        
          $sf="select * from login where email='".$row['pemail']."'";
            $de=mysqli_query($conn,$sf) or die(mysqli_error($conn));
        
            while($row0=mysqli_fetch_array($de))
            {  
               $as="select * from friends where (toemail='$enail' and fremail='".$row['pemail']."' and response=1) or (fremail='$enail' and toemail='".$row['pemail']."' and response=1)";
               $df=mysqli_query($conn,$as) or die(mysqli_error($as));
               $ccount=mysqli_num_rows($df);


               if($ccount>0)
               {
                if(!empty($row['images']))
                { 
                  ?>
                  <div class="card">
                  <b>
                  <button name='profiledisplay' id='profilebutton'  onclick="profilebutton(<?php echo $row['pid']?>)"> 
                  <span class='profile'>
                  <?php 
                      if(empty($row0['image']) && $row0['gender']=='male')
                        echo "<img src='man.jpg'>";
                       else if(empty($row0['image']) && $row0['gender']=='female')
                         echo "<img src='woman.jpg'>";
             
                          else
                         echo "<img src='image/".$row0['image']."'>";
                 ?>
                         </span>
                         </button>
                        <a href="friendpage.php?email=<?php echo $row0['email']?>"><b><?php echo $row0['name'];?></b></a>
                  
                   <?php
                $time=12-substr($row['timep'],11,2);
                if($time==0) $time=12;
                if($time>0) 
                echo substr($row['timep'],0,16)."am";
                else
                  echo substr($row['timep'],0,11).substr($time,1,10).":".substr($row['timep'],14,2)."pm";
                  ?>
                </b>
                  <center>
                   <div class="card-header">
                 <?php echo "<img  src='image/".$row['images']."'>"; ?>
                  </div>
                  
                  <div class="card-footer">
                  <p><b>Caption:</b></p>
                 
                          <?php if(!empty($row['text']))
                                 echo $row['text'];
                          ?>
                     
                </div>
                </center>
                </div>
                  </br>
                  <hr>
                    <?php
                }
               }
               else
                 {
                if($row0['mode']=="public" )
                { 
           if(!empty($row['images']))
           {
             ?>
             <div class="card">
             <b><button name='profiledisplay' id='profilebutton'  onclick="profilebutton(<?php echo $row['pid']?>)"> 
             <span class='profile'><?php echo "<img src='image/".$row0['image']."'>"?></span></button>
              <a href="friendpage.php?email=<?php echo $row0['email']?>"><span><?php echo $row0['name'];?></br></span></a>
             
              <?php
           $time=12-substr($row['timep'],11,2);
           if($time==0) $time=12;
           if($time>0) 
           echo substr($row['timep'],0,16)."am";
           else
             echo substr($row['timep'],0,11).substr($time,1,10).":".substr($row['timep'],14,2)."pm";?>
              </span></form></b>
             <center>
              <div class="card-header">
            <?php echo "<img  src='image/".$row['images']."'>"; ?>
             </div>
             
             <div class="card-footer">
             <p><b>Caption:</b><?php ?></p>
            
                     <?php if(!empty($row['text']))
                            echo $row['text'];
                     ?>
                
           </div>
           </center>
           </div>
             </br>
             <hr>
               <?php
           }
          }
        }
          // End Of While
        }
       }
      ?>
     <!-- Display Image -->

    <script>
      
      function close2(){
    document.getElementById("rowview").style.cssText="filter:blur(0px);display:block";
              document.getElementById("display").style.display="none";
              document.getElementById("buttonclose").style.cssText='left:-200px';


  }
       function profilebutton(value)
     {//      var v1=(value+1)*100;
       
    //         var v=value+100+v1;
    //         alert(v1+"--"+v)
            document.getElementById("buttonclose").style.cssText="left:200px;z-index:1;"
        document.getElementById("display").style.cssText="display:block";

        // document.getElementById("display").style.margintop=v+"px";


       
              var search=value;
              if(search=='')
              {

              }
              else
              {
                $.ajax({
                   url:"displayimage.php",
                   method:"post",   
                   data:{search:search},
                   dataType:"text",
                   success:function(response){
                    $("#display").html(response);

                   }            
 

                  });
              }
              document.getElementById("rowview").style.cssText="filter:blur(3px);display:none";
          }
      


   </script> 

 
      <!-- End Of displayImage -->
    </div>
    </div>
    
 </div>
 <!-- <request Column -->
 <div class="container tab-pane <?php
   if($_GET['get']=="edited")
    echo "fade";
    else if($_GET['get']=="request")
   echo  "active";


 ?>" id="Request">
 </br>
   <div class="row first">
    <div class="col-12">
    <div class='input-group'>
        <div class="input-group-prepend">
        <span class="input-group-text">Search By Name</span>
         </div>
       <input type="text"  onfocus="this.alue=''"   id="tlisting" class="form-control" >
      </div>
      <div id="tlistingd"></div>

    <!--Start First Contianer --></br>
      <div class='container'>
       <div class='row second'>
      <?php
     $sl="select * from friends where toemail='".$_SESSION['email']."' and response=0 order by id desc";
     $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
     if(mysqli_num_rows($result)>0)
     {
     while($row=mysqli_fetch_array($result))
     { 
          $fr="select * from login where email='".$row['fremail']."'";
          $frresult=mysqli_query($conn,$fr) or die(mysqli_error($conn));
          while($frrow=mysqli_fetch_array($frresult))
          {
            ?>
            <div class='col-12 col-sm-6'>
           <?php echo  "<img src='image/". $frrow['image']."'>";?>

            </div>
          <div class='col-12 mt-4 col-sm-6'>
          <a href="friendpage.php?email=<?php echo $frrow['email']?>"><?php echo $frrow['name']?></a></br>
         <form action="" method="post">
          <button name="respond" class='btn btn-primary btn-sm mt-3 ' name='respond'>Respond</button></br>
          <button name="ignore" class='btn btn-outline-info btn-sm mt-3 pl-3 pr-3' name='respond'>Ignore</button>
          </form>
          <?php
        //    Response
           if(isset($_POST['respond']))
           {
            $as="update friends set response=1 where toemail='".$_SESSION['email']."' and fremail='".$row['fremail']."'";

               $result34=mysqli_query($conn,$as) or die(mysqli_error($conn));
               if($result34)
               {
                   ?>
                   <script>
                    window.location.href="userpage.php?get=request";
                   </script>

                   <?php
               }


           }
           
        //   End of Response

        // Ignore
      if(isset($_POST['ignore']))
      {
    $sl32="delete from friends where toemail='".$_SESSION['email']."' and fremail='".$row['fremail']."'";
    $result32=mysqli_query($conn,$sl32) or die(mysqli_error($conn));
    if($result32)
    {
        ?>
        <script>
         window.location.href="userpage.php?get=request";
        </script>

        <?php
    }
           
      }

        // End Of Ignore
          ?>


          </div>

            <?php
          }
     }
    }
    else
    {
        ?>
        </br>
        <center><div class="alert alert-primary mt-2 text-center" role="alert"><strong>NO REQUEST'S TILL NOW</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
   </div></center>

        <?php
    }
     ?>
     </div>
     </div>
     <!-- End Of First Container -->
    </div>
   </div>
   </div>


   <!-- Start of friends List -->
    <div class='container tab-pane fade' id="list">
    </br>
    <div class="row first">
    <div class="col-12">
      <div class='input-group'>
        <div class="input-group-prepend">
        <span class="input-group-text">Search Your Freind's</span>
         </div>
       <input type="text" onfocus='this.value=''' name="listing" id="listing" class="form-control" >
      </div>
    <!--Start First Contianer --></br>
      <div class='container' >
      
      <div id='listingd'></div>

       <div class='row second'>
      <?php
     $sl="select * from friends where toemail='".$_SESSION['email']."' and response=1  or fremail='".$_SESSION['email']."' and response=1 order by id desc";
     $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
     if(mysqli_num_rows($result)>0)
     {
     while($row=mysqli_fetch_array($result))
     { 
        if($row['fremail']==$_SESSION['email'])
        {
          $fr="select * from login where email='".$row['toemail']."'";
          $frresult=mysqli_query($conn,$fr) or die(mysqli_error($conn));
          while($frrow=mysqli_fetch_array($frresult))
          {
            ?></br>
            <div class='col-12 col-sm-6'>
           <?php if(empty($frrow['image']) && $frrow['gender']=='male')
            echo "<img src='man.jpg'>";
            else if(empty($frrow['image']) && $frrow['gender']=='female')
            echo "<img src='woman.jpg'>";
             
            else
            echo "<img src='image/".$frrow['image']."'>";?>

            </div>
          <div class='col-12 mt-4 col-sm-6'>
          <a href="friendpage.php?email=<?php echo $frrow['email']?>"><strong><?php echo $frrow['name']?></strong></a>
          <a href="message.php?email=<?php echo $frrow['email']?>"><i class='fa fa-send fa-2x'></i></a></br></hr>

          </div>
</br><hr>
            <?php
          }
        }
        else
        {
          $fr="select * from login where email='".$row['fremail']."'";
          $frresult=mysqli_query($conn,$fr) or die(mysqli_error($conn));
          while($frrow=mysqli_fetch_array($frresult))
          {
            ?></br>
            <div class='col-12 col-sm-6'>
           <?php echo  "<img src='image/". $frrow['image']."'>";?>

            </div>
          <div class='col-12 mt-4 col-sm-6'>
          <a href="friendpage.php?email=<?php echo $frrow['email']?>"><strong><?php echo $frrow['name']?></strong></a>
          <a href="message.php?email=<?php echo $frrow['email']?>"><i class='fa fa-send fa-2x'></i></a></br></hr>

          </div>

            <?php
          }
        }
     }
    }
    else
    {
        ?>
        </br>
        <center><div class="alert alert-primary mt-2 text-center" role="alert"><strong>NO <i><b>FRIENDS'S</b></i> TILL NOW</strong>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
   </div></center>

        <?php
    }
     ?>
     </div>
     </div>
     <!-- End Of First Container -->
    </div>
   </div>
    </div>
   <!-- End Of Friends List -->
<!-- End Of Tab Content -->
</div>
</body>
 <!-- To Post -->
<?php
    if(isset($_POST['postsubmit']))
    {
        $image2=$_FILES['profile1']['name'];
        $text=$_POST['text'];
        if(!empty($image2 && $text))
        {
            $target="image/".basename($_FILES['profile1']['name']);
    $sl="insert into post(images,pemail,text) values('$image2','$email','$text')";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    move_uploaded_file($_FILES['profile1']['tmp_name'],$target);
    header("location:userpage.php");
    
        }
        else if(!empty($image2))
    {
    $target="image/".basename($_FILES['profile1']['name']);
    $sl="insert into post(images,pemail) values('$image2','$email')";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    move_uploaded_file($_FILES['profile1']['tmp_name'],$target);
    header("location:userpage.php");
    }
    else if(!empty($text))
    {
        $sl="insert into post(text,pemail) values('$text','$email')";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    header("location:userpage.php");

    }
     
    
    }
    ?>
 <!-- for Profile -->
<?php
if(isset($_POST['submit']))
{  
     $image2=$_FILES['profile']['name'];
    
     if(!empty($image2))
    {
    $target="image/".basename($_FILES['profile']['name']);
    $sl="insert into post(images,pemail) values('$image2','$email')";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    $sg="update login set image='$image2' where email='$email'";
    $result2=mysqli_query($conn,$sg) or die(mysqli_error($conn));
    move_uploaded_file($_FILES['profile']['tmp_name'],$target);
    header("location:userpage.php");
    }
    else
    {
        echo "";
    }
}
?>
</html>