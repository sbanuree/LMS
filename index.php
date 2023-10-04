<?php require_once'Connection.php';?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="msapplication-tap-highlight" content="no">
<link href="./main.css" rel="stylesheet">
<link href="./main.css" rel="stylesheet">
<link href="./assets/scripts/dt/datatables.min.css" rel="stylesheet">
<link href="./assets/scripts/bootstrap.min.css" rel="stylesheet">
<link href="./assets/scripts/jquery-ui.min.css" rel="stylesheet">
<link href="./assets/scripts/responsive.bootstrap.css" rel="stylesheet">
<link href="./assets/scripts/buttons.bootstrap.min.css" rel="stylesheet">
<link href="./assets/scripts/dataTables.bootstrap.css" rel="stylesheet">
<script src="./assets/scripts/jquery-1.12.4.min.js"></script>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
 <div class="app-main__inner">
 <div class="main-card mb-3 card col-lg-3" style=" margin-left:35%;margin-top: 5%; background: url('./assets/images/indexBackgrouodn.png');background-repeat: no-repeat;background-size: 100% 100%;" >
  <div class="card-body">
      <table class="mb-0  table-borderless" style="text-align:center;" >
        <thead>
          <tr>
            <td>
              <h3> LMS Login Form </h3>
            </td>
        </tr>
        </thead>
        <tbody>
          <tr>
           <th scope="row">
           <div class="position-relative form-group">
        <select name="cmbUserTypes" id="cmbUserTypes" class="form-control"></select>
          </div>
          </th>
        </tr>
          <tr>
           <th scope="row">
           <div class="position-relative form-group">
        <input name="userName" id="userName" placeholder="User Name"class="form-control">
          </div>
          </th>
        </tr>
          <tr>
          <th scope="row">
          <div class="position-relative form-group">
         <input name="password" id="password"  placeholder="Password" type="password"  class="form-control">
       </div>
     </th>
     </tr>
     <tr>
      <th scope="row">
        <button   id="btnLogin" class="mt-2 btn btn-primary">Sign in</button>
         </th>
       </tr>
     </tbody>

   </table>

</div>
</div>
<option value=""></option>
</div>

</div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="./assets/scripts/dt/datatables.min.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery.PrintArea.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./assets/scripts/jquery.validate.min.js"></script>
  <script src="./assets/scripts/additional-methods.min.js"></script>
<script type="text/javascript">

    $(document).ready( function(){
/*Checking Login*/
     $("#btnLogin").click(function(){
      $.ajax({
          type:"post",
          url:"data.php",
          data:{functionName:"checkLogin",userName:$("#userName").val(),password:$("#password").val(),userType:$("#cmbUserTypes option:checked").val()},
          success:function(data){
          if(data==1){
            window.location.href ="main.php";
          }
          else{alert("You entered wrong details!!! \n Try Again");}
          }
        });
     });
/* Loading User Types*/

    $.ajax({
          type:"post",
          url:"data.php",
          data:{functionName:"loadUserTypes"},
          success:function(data){
          $("#cmbUserTypes").html(data);
          }
        });



    });
</script>




</body>
</html>
