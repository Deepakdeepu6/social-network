<style>
img{
    height:100px;
    width:100px;
}
</style>
<?php
function ListFiles($dir) {
    if($dh = opendir($dir)) {
        $files = Array();
        $inner_files = Array();
        while($file = readdir($dh)) {
            if($file != "." && $file != ".." && $file[0] != '.') {
                if(is_dir($dir . "/" . $file)) {
                    $inner_files = ListFiles($dir . "/" . $file);
                    if(is_array($inner_files)) $files = array_merge($files, $inner_files); 
                } else {
                    array_push($files, $dir . "/" . $file);
                }
            }
        }
        closedir($dh);
       return $files;
    }
}
foreach (ListFiles('images/') as $key=>$file){
    echo "<div class=\"box\"><img src=\"$file\"/></div>";
}

?>




<?php
$image_extensions = array("png","jpg","jpeg","gif");

// Target directory
$dir = 'images/second/';
if (is_dir($dir)){

 if ($dh = opendir($dir)){

  // Read files
  while (($file = readdir($dh)) !== false){

   if($file != '' && $file != '.' && $file != '..'){

	// Thumbnail image path
	$thumbnail_path = $dir."".$file;
    
	// Image path

	$thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);


	// Check its not folder and it is image file
	if( !is_dir($thumbnail_path) &&
	   in_array($thumbnail_ext,$image_extensions)
	  ){
 ?>

	 <!-- Image -->
	 <a href="">
	  <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>

	 </a>
	
	 <!-- --- -->
	 <?php

	 // Break
	
	}
   }

  }
  closedir($dh);
 }
}
?>