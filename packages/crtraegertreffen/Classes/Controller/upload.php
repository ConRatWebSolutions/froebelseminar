<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location =    "/kunden/76054_37296/rp-hosting/217/232/typo3_9/fileadmin/user_upload/traegerlogos/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png", "pdf");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
     
   
			
	  $path = "/user_upload/traegerlogos/";
	  echo "fileadmin/user_upload/traegerlogos/".$filename;
	   
 
	   
   }else{
      echo 0;
   }
}