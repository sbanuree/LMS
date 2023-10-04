<?php 
require'Connection.php';
session_start();
       $functionName=$_POST["functionName"];

  /* Functions */

  if($functionName=="checkLogin"){

  $userName=$_POST['userName'];
  $pasd=$_POST['password'];
  $userType=$_POST['userType'];
  $result=mysqli_query($conn,"select * from tbl_user where cl_userLogin='".$userName."' and cl_uTypeID=$userType");
     if(mysqli_num_rows($result)>0){
      if($row=mysqli_fetch_assoc($result)){
        if($pasd==$row["cl_userPassword"]){
        $_SESSION['userName']=$row['cl_userName'];                  
        $_SESSION['userLogin']=$row['cl_userLogin'];                 
        $_SESSION['userId']= $row['cl_userID'];                  
        $_SESSION['userType']= $row['cl_uTypeID'];                   
        $_SESSION['userPassword']= $row['cl_userPassword']; 
        $outPut=true;}
      }
      else{echo false;}
      echo $outPut;
    }
           
  }
  if($functionName=="loadUserTypes"){
    $result=mysqli_query($conn,"Select * from tbl_userType");
    if(mysqli_num_rows($result)>0){
      $outPut="";
      while($row=mysqli_fetch_assoc($result)){
        $outPut.="<option value='".$row['cl_uTypeID']."'>".$row['cl_uType']."</option>";
      }
      echo $outPut;
    }
  }
    if($functionName=="loadUser"){
    $result=mysqli_query($conn,"Select * from tbl_user");
    if(mysqli_num_rows($result)>0){
      $outPut="";
      while($row=mysqli_fetch_assoc($result)){
        $outPut.="<option value='".$row['cl_userID']."'>".$row['cl_userName']."</option>";
      }
      echo $outPut;
    }
  }
  if ($functionName=="composeEmail") {
      $filePath=$_POST['path'];
       $to=$_POST["toWhom"];
       $subject=$_POST["subject"];
       $date=$_POST["date"];
       $body=$_POST["body"];
      $Query="INSERT INTO `tbl_letters`(`cl_lToWhom`, `cl_lByWhom`, `cl_lSubject`, `cl_lDate`, `cl_lDescription`,`cl_attachment`) VALUES (?,?,?,?,?,?)";
      $insertStmt=mysqli_stmt_init($conn);              
        if(mysqli_stmt_prepare($insertStmt,$Query)){
                mysqli_stmt_bind_param($insertStmt,"iissss",$to,$_SESSION['userId'],$subject,$date,$body,$filePath);
                mysqli_stmt_execute($insertStmt);
            if(mysqli_error($conn)){echo "Error ".mysqli_error($conn);}
            else{ echo "Letter Sent Successfully!";
          }
              }
              elseif (!mysqli_stmt_prepare($insertStmt,$Query)){
                echo "error   ".mysqli_stmt_error($insertStmt);
              }

}

    if($functionName=="showLetters"){
    $result=mysqli_query($conn,"SELECT l.`cl_lID`,u.cl_userName, `cl_lSubject`,`cl_lByWhom`, `cl_lDate`,r.cl_lRStatus, `cl_attachment` FROM `tbl_letters` l 
JOIN tbl_user u ON(l.`cl_lToWhom`=u.cl_userID)
JOIN tbl_letterresponse r ON (l.cl_lID=r.cl_lID)
WHERE `cl_lByWhom`=".$_SESSION['userId']);
    if(mysqli_num_rows($result)>0){
      $outPut="";
      while($row=mysqli_fetch_assoc($result)){
        if ($row['cl_lRStatus']==1)$status="New Submitted";
        elseif ($row['cl_lRStatus']==2)$status="Archive Registered";
        elseif ($row['cl_lRStatus']==3)$status="Approved";
        if($_SESSION['userId']===$row['cl_lByWhom']){$btn="disabled";}
        $outPut.="
        <tr>
          <td>".$row['cl_lID']."</td>
          <td>".$row['cl_userName']."</td>
          <td>".$row['cl_lSubject']."</td>
          <td>".$row['cl_lDate']."</td>
          <td>".$status."</td>
          <td class='text-center'>
           <button class='mb-2 mr-2 btn-transition btn btn-outline-info btnAction'  id='".$row['cl_lID']."' $btn>
               <i class='pe-7s-pen btn-icon-wrapper'> </i>
                </button>
          </td>
          </tr>";
      }
      echo $outPut;
    }
  }
 mysqli_close($conn);
 ?>


