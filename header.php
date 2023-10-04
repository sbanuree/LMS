<?php 
/*require 'Connection.php';
$rights = array();
$result=mysqli_query($conn,"
SELECT  u.`cl_uTypeID`, u.`cl_uRightID`, `cl_uState` 
FROM `tbl_userassignedrights` u
JOIN tbl_usertype ut ON (u.`cl_uTypeID`=ut.cl_uTypeID)
JOIN tbl_userrights ur ON (u.`cl_uRightID`=ur.cl_uRightID)
WHERE u.`cl_uTypeID`=".$_SESSION['userType']);
   if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $rights[$row['cl_rightName']]=$row['cl_uState'];
      }
    }*/
 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">LMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php /*if($rights["LetterSending"]==1){
    $_SESSION['LetterSending']=true;*/?>
      <li class="nav-item">
        <a class="nav-link" href="frm_compose">Compose</a>
      </li>
     <?php/* }  if($rights["LetterView"]==1){
      	    $_SESSION['LetterView']=true;*/?>
      <li class="nav-item">
        <a class="nav-link" href="frm_inbox">Inbox</a>
      </li>
     <?php /*}*/ ?>
     
    </ul>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Setting
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"href="#">Logout</a>
          <a class="dropdown-item" href="#">Setting</a>
        </div>
      </li>
  </div>
</nav
