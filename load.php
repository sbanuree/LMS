<?php

  $filename = $_POST['filename'];

  $target_directory = "assets/attachments/";
  $target_file = $target_directory.basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
  $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $newfilename = $target_directory.$filename.".".$filetype;
if(file_exists($newfilename)) unlink($newfilename);
/*if($filetype == "jpg" || $filetype == "png" || $filetype == "jpeg")
     {*/
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
        else echo 0;
 /*       }
else{echo "Plese select correct format (jpg, png, jpeg)";}*/
  

 ?>