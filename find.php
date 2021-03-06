<?php
session_start();
include("process.php");
if(isset($_POST['search']))
$name=$_POST['search'];
if(isset($_POST['searcht']))
$name2=$_POST['searcht'];
if(!empty($name))
{
     $sl="select * from friends where toemail='".$_SESSION['email']."' or fremail='".$_SESSION['email']."' and response=1 order by id desc";
     $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
     if(mysqli_num_rows($result)>0)
     {
     while($row=mysqli_fetch_array($result))
     { 
        if($row['fremail']==$_SESSION['email'])
        {
          $fr="select * from login where email='".$row['toemail']."' and name='$name'";
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
        else
        {
          $fr="select * from login where email='".$row['fremail']."' and name='$name'";
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
}
//    find World Friend
else if(!empty($name2))
{
    
         $fr="select * from login where  name='$name2'";
         $frresult=mysqli_query($conn,$fr) or die(mysqli_error($conn));
         while($frrow=mysqli_fetch_array($frresult))
         {
           ?>
           <div class='col-12 col-sm-6'>
          <?php if(empty($frrow['image']) && $frrow['gender']=='male')
            echo "<img src='man.jpg'>";
            else if(empty($frrow['image']) && $frrow['gender']=='female')
            echo "<img src='woman.jpg'>";
             
            else
            echo "<img src='image/".$frrow['image']."'>";
?>
           </div>
         <div class='col-12 mt-4 col-sm-6'>
         <a href="friendpage.php?email=<?php echo $frrow['email']?>"><strong><?php echo $frrow['name']?></strong></a><hr>

         </div>

           <?php
         }
       
    
  
}

     ?>