
<?php require 'page_header.php';  ?>
<?php require 'header.php';  ?>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
 <div class="app-main__inner" >
 <div class="main-card mb-12 card col-lg-12" >
  
  <table class="table" id="tblInbox">
    <thead>
      <tr>
        <th>ID</th>
        <th>By</th>
        <th>Subject</th>
        <th>Date of Letter</th>
        <th>Stat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tblInboxBody"></tbody>
  </table>
</div>
</div>

</div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="./assets/scripts/dt/datatables.min.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="./assets/scripts/jquery.PrintArea.js"></script>
  <script src="./assets/scripts/jquery.validate.min.js"></script>
  <script src="./assets/scripts/additional-methods.min.js"></script>
<script type="text/javascript">

    $(document).ready( function(){

/* Loading User Types*/
loadData();
    $.ajax({
          type:"post",
          url:"data.php",
          data:{functionName:"loadUser"},
          success:function(data){
          $("#cmbUsers").html(data);
          }
        });
        });

     function loadData(){
        $.ajax({
          url: "data.php",
          type:"POST",
          data:{functionName:"showLetters"},
          success: function(data){
            $("#tblInbox").DataTable().destroy();
            $("#tblInboxBody").html(data);
            $("#tblInbox").DataTable({
                  dom: 'Bfrtip',
                  searchable:true,
                  paging:true,
                  buttons: [
                      'pageLength','copy', 'excel', 'pdf', 'print'
                  ]
              });
          }});}
</script>




</body>
</html>
