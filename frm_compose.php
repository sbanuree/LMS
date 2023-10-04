
<?php require 'page_header.php';  ?>
<?php require 'header.php';  ?>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
 <div class="app-main__inner" style="margin-left: 35%;">
 <div class="main-card mb-6 card col-lg-6" >
  <div class="form-group">
    <label for="exampleInputEmail1">To:</label>
  <select name="cmbUsers" id="cmbUsers" class="form-control"></select>
  </div>
  <div class="form-group">
    <label>Subject</label>
    <input type="text" class="form-control" id="txtSubject" placeholder="Subject">
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" id="txtDate">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea class="form-control" id="txtBody"></textarea>
  </div>
  <div class="form-group">
    <label>Attachment</label>
    <input type="file" id="txtAttachment" class="form-control billToUpload">
  </div>
  <button  id="btnSend" class="btn btn-primary">Send</button>

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

    $.ajax({
          type:"post",
          url:"data.php",
          data:{functionName:"loadUser"},
          success:function(data){
          $("#cmbUsers").html(data);
          }
        });
    var fileName="";
$("#txtAttachment").change(function(){
  if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
          path=$("#txtAttachment").val();
           ext=path.substr( (path.lastIndexOf('.') +1) ); 
           alert(ext);  
            }
            reader.readAsDataURL(this.files[0]);
        }
 });

$("#btnSend").click(function(){
  fileUpload($("#txtSubject").val(),'.billToUpload');
   var att="assets/attachments/"+$("#txtSubject").val()+"."+ext;
   alert(att);
  $.ajax({
          type:"post",
          url:"data.php",
          data:{functionName:"composeEmail",toWhom:$("#cmbUsers option:checked").val(),subject:$("#txtSubject").val(),date:$("#txtDate").val(),body:$("#txtBody").val(),path:att},
          success:function(data){
            alert(data);
          }

  });

});


var ext="";

    });
function fileUpload(newName,fileToUpload){
 var filename = newName;                    //To save file with this name
  var file_data = $(fileToUpload).prop('files')[0];    //Fetch the file
  var form_data = new FormData();
  form_data.append("file",file_data);
  form_data.append("filename",filename);
  //Ajax to send file to uploads
  $.ajax({
      url: "load.php",                      //Server api to receive the file
             type: "POST",
             dataType: 'script',
             cache: false,
             contentType: false,
             processData: false,
             data: form_data,
          success:function(dat2){
            if(dat2==0) {alert("Unable to Upload"); }
            else { }
          }
    });}
</script>




</body>
</html>
